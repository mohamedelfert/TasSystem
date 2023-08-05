<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function newOrder(Request $request)
    {
        $rules = [
            'order_id' => 'required',
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required',
            'slot_id' => 'required|exists:slots,id',
            'teacher_id' => 'required|exists:teachers,id',
            'branch_id' => 'required|exists:branches,id',
            'price' => 'required',
            'final_price' => 'sometimes',
            'coupon_name' => 'sometimes|nullable',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return json_response($validate->errors(), 'Error Data Please Try Again!', '500');
        }

        $subject = Subject::findOrFail($request->subject_id);

        if ($request->final_price) {
            $final_price = $request->final_price;
        } else {
            $final_price = $subject->price;
        }

        // order create
        $order = Order::create([
            'order_id' => $request->order_id,
            'subject_id' => $request->subject_id,
            'date' => $request->date,
            'slot_id' => $request->slot_id,
            'teacher_id' => $request->teacher_id,
            'branch_id' => $request->branch_id,
            'price' => $request->price,
            'final_price' => $request->price,
            'coupon_name' => $request->coupon_name,
        ]);

        return json_response($order, 'Order Created Successfully', '200');
    }
}
