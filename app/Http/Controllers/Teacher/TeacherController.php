<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function teacherDashboard()
    {
        return view('teacher-dashboard.home');
    }
}
