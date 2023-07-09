<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\WorkdayController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('selection');

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth:web'])->group(function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('home');

    Route::resource('countries', CountryController::class);

    Route::resource('branches', BranchController::class);

    Route::resource('slots', SlotController::class);

    Route::resource('workdays', WorkdayController::class);

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');
});

require __DIR__ . '/auth.php';
