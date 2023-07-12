<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethods::latest()->get();
        return view('dashboard.payment-methods.index', compact('paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.payment-methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:payment_methods'];
        $data = $this->validate($request, $rules);

        $data['name'] = $request->name;
        PaymentMethods::create($data);

        toast(__('Added successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $paymentMethod = PaymentMethods::findOrFail($id);
        return view('dashboard.payment-methods.edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = ['name' => 'required|unique:payment_methods,name,' . $id];
        $data = $this->validate($request, $rules);

        $data['name'] = $request->name;
        $paymentMethod = PaymentMethods::findOrFail($id);
        $paymentMethod->update($data);

        toast(__('Edited successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paymentMethod = PaymentMethods::findOrFail($id);
        $paymentMethod->delete();
        toast(__('Deleted successfully'), 'success');
        return redirect(route('admin.payment-methods.index'));
    }
}
