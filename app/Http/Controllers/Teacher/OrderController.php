<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::with('teacher')->where('teacher_id', auth()->user()->id)
            ->latest()->paginate(10);
        $subjects = Subject::all();
        return view('teacher-dashboard.orders.index', compact('orders', 'subjects'));
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
}
