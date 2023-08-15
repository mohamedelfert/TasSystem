<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Subject;
use App\Models\Teacher;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('teacher')->where('teacher_id', auth()->user()->id)
            ->latest()->paginate(10);
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.index', compact('orders', 'subjects'));
    }

    public function orderDetails($id)
    {
        $orderDetails = OrderDetail::with('order')->where('order_id', $id)
            ->latest()->paginate(10);
        return view('teacher-dashboard.orders.order-details', compact('orderDetails'));
    }

    public function filterSubject(Request $request)
    {
        $orders = Order::with('teacher')->select('*')
            ->where('subject_id', $request->subject_id)
            ->where('teacher_id', auth()->user()->id)
            ->get();
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.index', compact('orders', 'subjects'));
    }

    public function filterStatus(Request $request)
    {
        $orders = Order::with('teacher')->select('*')
            ->where('status', $request->status)
            ->where('teacher_id', auth()->user()->id)
            ->get();
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.index', compact('orders', 'subjects'));
    }

    public function dateSearch(Request $request)
    {
        $from_date = date($request->from_date);
        $to_date = date($request->to_date);
        $orders = Order::with('teacher')->where('teacher_id', auth()->user()->id)
            ->whereBetween('date', [$from_date, $to_date])
            ->get();
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.index', compact('orders', 'from_date', 'to_date', 'subjects'));
    }

    public function checkout(Request $request, $price)
    {
        $fine_type_id = $request->fine_type_id;
        $orderDetail = OrderDetail::findOrFail($request->id);
        return view('teacher-dashboard.orders.checkout', compact(['price', 'orderDetail', 'fine_type_id']));
    }

    public function pay(Request $request)
    {
        $teacher = Teacher::findOrFail(auth()->user()->id);

        $cart_id = $request->order_id;
        $cart_amount = $request->price;
        $cart_description = 'Payment For Cancel Slot Time';
        $name = $teacher->first_name . ' ' . $teacher->last_name;
        $email = $teacher->email;
        $phone = $teacher->phone;
        $street1 = $teacher->address;
        $city = $teacher->country->getTranslation('name', 'en');
        $state = $teacher->country->getTranslation('name', 'en');
        $country = $teacher->country->getTranslation('name', 'en');
        $zip = '01254';
        $ip = $request->ip();
        $same_as_billing = true;
//        $return = route('teacher.order_pay_success');
//        $callback = route('teacher.order_pay_success');
//        $return = 'https://webhook.site/1beca553-73ed-472f-bd34-d2d63f457550';
//        $callback = 'https://webhook.site/1beca553-73ed-472f-bd34-d2d63f457550';
        $language = 'en';

        $pay = paypage::sendPaymentCode('all')
            ->sendTransaction('sale')
            ->sendCart($cart_id, $cart_amount, $cart_description)
            ->sendCustomerDetails($name, $email, $phone, $street1, $city, $state, $country, $zip, $ip)
//            ->sendShippingDetails($name = null, $email = null, $phone = null, $street1 = null, $city = null, $state = null, $country = null, $zip = null, $ip = null)
            ->sendHideShipping(true)
//            ->sendURLs($return, $callback)
            ->sendURLs(route('order_pay_success'), route('order_pay_success'))
            ->sendLanguage($language)
            ->sendUserDefined(["udf1" => $teacher->id, "udf2" => $cart_id])
            ->sendFramed(false)
            ->create_pay_page(); // to initiate payment

        return $pay;

        //        try {
//            $charge = Stripe::charges()->create([
//                'currency' => 'USD',
//                'source' => $request->stripeToken,
//                'amount' => $request->price,
//                'description' => 'Payment From Tas System',
//            ]);
//
//            $chargeId = $charge['id'];
//
//            if ($chargeId) {
//                // delete slot time from order details table
//                $orderDetail = OrderDetail::findOrFail($request->id);
//                $orderDetail->delete();
//
//                // get order details from order table
//                $order = Order::findOrFail($request->order_id);
//                $countOrderDetails = $order->count_order_details;
//                if ($countOrderDetails > 0) {
//                    $count = $order->count_order_details - 1;
//                    $order['count_order_details'] = $count;
//                    $order->update();
//                }
//
//                // fines create in fines table after pay
//                $order->fines()->create([
//                    'payment_method_id' => 1,
//                    'teacher_id' => $order->teacher_id,
//                    'price' => $request->price,
//                    'status' => 'paid',
//                    'payment_date' => now(),
//                    'fine_type_id' => $request->fine_type_id,
//                ]);
//
//                toast(__('Payment was done successfully'), 'success');
//                return redirect()->route('teacher.orders.index');
//            } else {
//                return redirect()->back();
//            }
//        } catch (\Exception $e) {
//            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
//        }
    }

    public function orderPaySuccess(Request $request)
    {
        if ($request['respStatus'] == 'A') {
            $order_id = $request['cartId'];
            $tranRef = $request['tranRef'];
            $transaction = Paypage::queryTransaction($tranRef);
            if (@$transaction->payment_result->response_status == 'A' && $transaction->success) {
                // delete slot time from order details table
                $orderDetail = OrderDetail::findOrFail($request->id);
                $orderDetail->delete();

                // get order details from order table
                $order = Order::findOrFail($request->order_id);
                $countOrderDetails = $order->count_order_details;
                if ($countOrderDetails > 0) {
                    $count = $order->count_order_details - 1;
                    $order['count_order_details'] = $count;
                    $order->update();
                }

                // fines create in fines table after pay
                $order->fines()->create([
                    'payment_method_id' => 1,
                    'teacher_id' => $order->teacher_id,
                    'price' => $request->price,
                    'status' => 'paid',
                    'payment_date' => now(),
                    'fine_type_id' => $request->fine_type_id,
                ]);

                toast(__('Payment was done successfully'), 'success');
                return redirect()->route('teacher.orders.index');
            }
        } else {
            toast(__('Payment Failed'), 'error');
            return redirect()->back();
        }
        toast(__('Payment Failed ....'), 'error');
        return redirect()->back();
    }

    public function cancelOrder($id)
    {
        $order = Order::findOrFail($id);
        if ($order->count_order_details === 0) {
            $order->update(['status' => 'cancelled']);
            $order->delete();
        }
        toast(__('main.data_cancelled_successfully'), 'success');
        return back();
    }

    public function finishedOrders()
    {
        $orders = Order::with('teacher')->where('teacher_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->where('finished_at', '!=', null)
            ->latest()->paginate(10);
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.finished-orders', compact('orders', 'subjects'));
    }
}
