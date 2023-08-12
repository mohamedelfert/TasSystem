<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Subject;
use App\Models\Teacher;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

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

    public function checkout($price)
    {
        return view('teacher-dashboard.orders.checkout', compact('price'));
    }

    public function pay(Request $request)
    {
        $charge = Stripe::charges()->create([
            'currency' => 'USD',
            'source' => $request->stripeToken,
            'amount' => $request->price,
            'description' => 'Payment From Tas System',
        ]);

        $chargeId = $charge['id'];

        if ($chargeId) {
            toast(__('Payment was done successfully'), 'success');
            return redirect()->route('teacher.editSlot',auth()->user()->id);
        } else {
            return redirect()->back();
        }
    }

    public function cancelOrder($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        return $orderDetail;
        $order->update(['status' => 'cancelled']);

        // fines create
        $order->fines()->create([
            'payment_method_id' => 1,
            'teacher_id' => $order->teacher->id,
            'price' => $order->price,
            'status' => 'unpaid',
            'payment_date' => now(),
        ]);

        toast(__('main.data_cancelled_successfully'), 'success');
        return back();
    }

    public function finishedOrders()
    {
        $orders = Order::with('teacher')->where('teacher_id', auth()->user()->id)
            ->where('status', 'accepted')
            ->where('finished_at','!=',null)
            ->latest()->paginate(10);
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.finished-orders', compact('orders', 'subjects'));
    }
}
