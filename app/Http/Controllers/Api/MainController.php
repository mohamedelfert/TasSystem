<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewOrderApiRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Slot;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class MainController extends Controller
{
    public function newOrder(NewOrderApiRequest $request)
    {
//        $rules = [
//            'app_order_id' => 'required',
//            'teacher_id' => 'required|exists:teachers,id',
//            'branch_id' => 'required|exists:branches,id',
//            'subject_id' => 'required|exists:subjects,id',
//            'details.*.app_detail_id' => 'required',
//            'details.*.date' => 'required',
//            'details.*.start_at' => 'required',
//            'details.*.end_at' => 'required',
//            'date' => 'required',
//            'price' => 'required',
//            'final_price' => 'sometimes',
//            'coupon_name' => 'sometimes|nullable',
//        ];
//
//        $validate = Validator::make($request->all(), $rules);
//
//        if ($validate->fails()) {
//            return json_response($validate->errors(), 'Error Data Please Try Again!', '500');
//        }

        $countOrderDetails = count($request->details);

        $subject = Subject::findOrFail($request->subject_id);

        if ($request->final_price) {
            $final_price = $request->final_price;
        } else {
            $final_price = $subject->price;
        }

        //order create
        $order = Order::create([
            'app_order_id' => $request->app_order_id,
            'teacher_id' => $request->teacher_id,
            'branch_id' => $request->branch_id,
            'subject_id' => $request->subject_id,
            'count_order_details' => $countOrderDetails,
            'date' => $request->date,
            'price' => $request->price,
            'final_price' => $request->price,
            'coupon_name' => $request->coupon_name,
        ]);

        //order details create
        foreach ($request->details as $detail) {
            $start = $detail['start_at'];
//            return $start;
            $end = $detail['end_at'];
//            return $end;

            // get slot by id
            $slot = Slot::whereBetween('start_at', [$start, $end])->whereBetween('end_at', [$start, $end])->first();
            OrderDetail::create([
                'order_id' => $order->id,
                'app_detail_id' => $detail['app_detail_id'],
                'subject_id' => $request->subject_id,
                'slot_id' => $slot->id,
                'date' => $detail['date'],
                'start_at' => $detail['start_at'],
                'end_at' => $detail['end_at'],
            ]);
        }

        return json_response($order, 'Order Created Successfully', '200');
    }

    public function orderPaySuccess(Request $request)
    {
        return $request->all();
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
}
