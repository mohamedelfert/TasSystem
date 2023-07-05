<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlotController;
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

Route::name('dashboard.')->middleware(['language', 'auth:web'])->prefix('dashboard')->group(function () {

    Route::get('/', function () {
        return redirect(route('dashboard.home'));
    });

    Route::get('/home', [HomeController::class, 'dashboard'])->name('home');

    Route::resource('countries', CountryController::class);

    Route::resource('branches', BranchController::class);

    Route::resource('slots', SlotController::class);

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
