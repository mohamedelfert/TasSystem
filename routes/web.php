<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
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

require __DIR__ . '/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('selection');

Route::prefix('admin')->name('admin.')->middleware(['auth:web', 'auto_check_permission'])->group(function () {

    Route::get('/', [HomeController::class, 'dashboard'])->name('home');

    Route::resource('countries', CountryController::class);

    Route::resource('branches', BranchController::class);

    Route::resource('slots', SlotController::class);

    Route::resource('workdays', WorkdayController::class);

    Route::resource('payment-methods', PaymentMethodController::class);

    Route::resource('teachers', TeacherController::class);

    Route::resource('systems', SystemController::class);

    Route::resource('subjects', SubjectController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('fines', FineController::class);

    Route::get('paid/{id}', [FineController::class, 'paid'])->name('paid');

    Route::get('unpaid/{id}', [FineController::class, 'unpaid'])->name('unpaid');

    Route::post('filter-teacher', [OrderController::class,'filterTeacher'])->name('filterTeacher');

    Route::post('filter-status', [OrderController::class,'filterStatus'])->name('filterStatus');

    Route::post('filter-subject', [OrderController::class,'filterSubject'])->name('filterSubject');

    Route::post('date-search', [OrderController::class,'dateSearch'])->name('dateSearch');

    /**************************** Users & Roles *******************************/
    Route::resource('users', UserController::class);
    Route::get('/users/profile/{id}', [UserController::class, 'showProfile'])->name('showProfile');
    Route::get('/users/{id}/profile', [UserController::class, 'editProfile'])->name('editProfile');
    Route::put('/users/profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::resource('roles', RoleController::class);

    //================= this route for change language ( ar - en ) ===================//
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');
});
