<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::when($request->search, function ($q) use ($request) {
            return $q->where('price', 'LIKE', '%' . $request->search . '%')
                ->orWhere('order_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('status', 'LIKE', '%' . $request->search . '%');
        })->withTrashed()->latest()->paginate(10);
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.orders.index', compact('orders', 'teachers', 'subjects'));
    }

    public function dateSearch(Request $request)
    {
        $from_date = date($request->from_date);
        $to_date = date($request->to_date);
        $orders = Order::whereBetween('date', [$from_date, $to_date])->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.orders.index', compact('orders', 'from_date', 'to_date', 'teachers', 'subjects'));
    }

    public function filterTeacher(Request $request)
    {
        $orders = Order::select('*')->where('teacher_id', $request->teacher_id)->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.orders.index', compact('orders', 'teachers', 'subjects'));
    }

    public function filterSubject(Request $request)
    {
        $orders = Order::select('*')->where('subject_id', $request->subject_id)->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.orders.index', compact('orders', 'teachers', 'subjects'));
    }

    public function filterStatus(Request $request)
    {
        $orders = Order::select('*')->where('status', $request->status)->get();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('dashboard.orders.index', compact('orders', 'teachers', 'subjects'));
    }
}
