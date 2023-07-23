<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkdayRequest;
use App\Models\Workday;

class WorkdayController extends Controller
{
    public function index()
    {
        $workdays = Workday::latest()->get();
        return view('dashboard.workdays.index', compact('workdays'));
    }
}
