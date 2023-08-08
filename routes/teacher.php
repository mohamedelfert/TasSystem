<?php

use App\Http\Controllers\Teacher\FineController;
use App\Http\Controllers\Teacher\HomeController;
use App\Http\Controllers\Teacher\OrderController;
use App\Http\Controllers\Teacher\SlotController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::prefix('teacher')->name('teacher.')->middleware(['auth:teacher'])->group(function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('home');

    Route::resource('teachers', TeacherController::class);

    Route::resource('orders', OrderController::class);

//    Route::get('new-orders',[OrderController::class,'newOrders'])->name('newOrders');

    Route::get('finished-orders', [OrderController::class, 'finishedOrders'])->name('finishedOrders');

    Route::get('cancel/{id}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');

    Route::post('filter-status', [OrderController::class, 'filterStatus'])->name('filterStatus');

    Route::post('filter-subject', [OrderController::class, 'filterSubject'])->name('filterSubject');

    Route::post('date-search', [OrderController::class, 'dateSearch'])->name('dateSearch');

    Route::resource('fines', FineController::class);

//    Route::get('pay/{id}', [FineController::class,'payFine'])->name('payFine');

    Route::resource('slots', SlotController::class);
    Route::get('createSlot', [SlotController::class, 'createSlot'])->name('createSlot');
    Route::post('doCreateSlot', [SlotController::class, 'doCreateSlot'])->name('doCreateSlot');
    Route::get('editSlot/{id}', [SlotController::class, 'editSlot'])->name('editSlot');
    Route::put('doEditSlot/{id}', [SlotController::class, 'doEditSlot'])->name('doEditSlot');

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');

});

