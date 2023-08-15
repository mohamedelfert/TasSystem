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

    /********************************* Teachers **************************************/
    Route::resource('teachers', TeacherController::class);

    /********************************* Orders **************************************/
    Route::resource('orders', OrderController::class);
    Route::get('finished-orders', [OrderController::class, 'finishedOrders'])->name('finishedOrders');
    Route::get('details/{id}', [OrderController::class, 'orderDetails'])->name('orderDetails');
    Route::get('order-checkout/{price}', [OrderController::class, 'checkout'])->name('orderCheckout');
    Route::post('order-fine-pay', [OrderController::class, 'pay'])->name('orderFinePay');
    Route::get('cancel/{id}', [OrderController::class, 'cancelOrder'])->name('cancelOrder');
    Route::post('filter-status', [OrderController::class, 'filterStatus'])->name('filterStatus');
    Route::post('filter-subject', [OrderController::class, 'filterSubject'])->name('filterSubject');
    Route::post('date-search', [OrderController::class, 'dateSearch'])->name('dateSearch');
    Route::get('paytabs/pay-success',[OrderController::class, 'orderPaySuccess'])->name('pay_success');

    /********************************* Fines **************************************/
    Route::resource('fines', FineController::class);

    /********************************* Slots **************************************/
    Route::resource('slots', SlotController::class);
    Route::get('getSlots', [SlotController::class, 'getSlots'])->name('getSlots');
    Route::get('getNewSlots', [SlotController::class, 'getNewSlots'])->name('getNewSlots');
    Route::get('createSlot', [SlotController::class, 'createSlot'])->name('createSlot');
    Route::post('doCreateSlot', [SlotController::class, 'doCreateSlot'])->name('doCreateSlot');
    Route::get('editSlot/{id}', [SlotController::class, 'editSlot'])->name('editSlot');
    Route::put('doEditSlot/{id}', [SlotController::class, 'doEditSlot'])->name('doEditSlot');
    Route::get('slot-checkout/{price}', [SlotController::class, 'checkout'])->name('slotCheckout');
    Route::post('slot-fine-pay', [SlotController::class, 'pay'])->name('slotFinePay');

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');

});

