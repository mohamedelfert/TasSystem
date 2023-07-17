<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::when($request->search, function ($q) use ($request) {
            return $q->where('name->ar', 'LIKE', '%' . $request->search . '%')
                ->orWhere('name->en', 'LIKE', '%' . $request->search . '%')
                ->orWhere('gender', 'LIKE', '%' . $request->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $request->search . '%');
        })->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }
}
