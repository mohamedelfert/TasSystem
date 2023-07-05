<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['language','auth:teacher'])->group(function () {

    Route::get('/teachers/dashboard', [TeacherController::class, 'teacherDashboard'])->name('teacher-dashboard');

    Route::get('lang-ar', function () {
        session()->put('lang', 'ar');
        return back();
    })->name('lang-ar');

    Route::get('lang-en', function () {
        session()->put('lang', 'en');
        return back();
    })->name('lang-en');

});

require __DIR__ . '/auth.php';
