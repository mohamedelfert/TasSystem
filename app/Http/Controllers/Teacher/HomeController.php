<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Fine;
use App\Models\Order;
use App\Models\Slot;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $slots = Slot::join("slot_teacher", "slot_teacher.slot_id", "=", "slots.id")
            ->where("slot_teacher.teacher_id", auth()->guard('teacher')->id())
            ->get();

        $orders = Order::count();
        $newOrders = Order::where('status', 'pending')->count();
        $acceptedOrders = Order::where('status', 'accepted')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $fines = Fine::count();

        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('doughnut')
            ->size(['width' => '720', 'height' => 200])
            ->labels(['orders', 'new orders', 'accepted orders', 'cancelled orders', 'fines'])
            ->datasets([
                [
                    'backgroundColor' => ['#1cae7f', '#f84f6c', '#0372e7', '#f57c3c', '#f84f6c'],
                    'hoverBackgroundColor' => ['#1cae7f', '#f84f6c', '#0372e7', '#f57c3c', '#f84f6c'],
                    'data' => [$orders, $newOrders, $acceptedOrders, $cancelledOrders, $fines]
                ]
            ])
            ->options([]);

        return view('teacher-dashboard.home', compact('chartjs','slots'));
    }
}
