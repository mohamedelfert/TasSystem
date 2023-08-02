<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentMethodRequest;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(Request $request)
    {
        $paymentMethods = new PaymentMethod();

        if ($request->has('view_deleted')) {
            $paymentMethods = $paymentMethods->onlyTrashed();
        }

        $paymentMethods = $paymentMethods->latest()->get();

        return view('dashboard.payment-methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        $paymentMethod = new PaymentMethod();
        return view('dashboard.payment-methods.create', compact('paymentMethod'));
    }

    public function store(PaymentMethodRequest $request)
    {
        PaymentMethod::create($request->all());
        toast(__('main.data_added_successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }

    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('dashboard.payment-methods.edit', compact('paymentMethod'));
    }

    public function update(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        $payment_method->update($request->all());
        toast(__('main.data_updated_successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();
        toast(__('main.data_deleted_successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }

    public function restore($id)
    {
        PaymentMethod::withTrashed()->find($id)->restore();
        return back();
    }

    public function restoreAll()
    {
        PaymentMethod::onlyTrashed()->restore();
        return back();
    }
}
