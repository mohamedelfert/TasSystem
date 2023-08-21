<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\FineTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\SlotValidationController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkdayController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::prefix('admin')->name('admin.')->middleware(['auth:web', 'auto_check_permission'])->group(function () {

        Route::get('/', [HomeController::class, 'dashboard'])->name('home');

        /********************************* Countries **************************************/
        Route::resource('countries', CountryController::class);
        Route::get('countries/restore/one/{id}', [CountryController::class, 'restore'])->name('restoreCountry');
        Route::get('countries/restoreAllCountries', [CountryController::class, 'restoreAll'])->name('restoreAllCountries');

        /********************************* Branches **************************************/
        Route::resource('branches', BranchController::class);
        Route::get('branches/restore/one/{id}', [BranchController::class, 'restore'])->name('restoreBranch');
        Route::get('branches/restoreAllBranches', [BranchController::class, 'restoreAll'])->name('restoreAllBranches');

        /********************************* Slots **************************************/
        Route::resource('slots', SlotController::class);
        Route::get('slots/restore/one/{id}', [SlotController::class, 'restore'])->name('restoreSlot');
        Route::get('slots/restoreAllSlots', [SlotController::class, 'restoreAll'])->name('restoreAllSlots');

        /********************************* Slots Validation **************************************/
//    Route::resource('slots-validation', SlotValidationController::class);
        Route::get('slot-validations', [SlotValidationController::class, 'editSlotValidation'])->name('editSlotValidation');
        Route::put('slot-validations', [SlotValidationController::class, 'doEditSlotValidation'])->name('doEditSlotValidation');
//    Route::get('slots-validation/restore/one/{id}', [SlotValidationController::class, 'restore'])->name('restoreSlotValidation');
//    Route::get('slots-validation/restoreAllSlotsValidation', [SlotValidationController::class, 'restoreAll'])->name('restoreAllSlotsValidation');

        /********************************* Workdays **************************************/
        Route::resource('workdays', WorkdayController::class);

        /********************************* PaymentMethods **************************************/
        Route::resource('payment-methods', PaymentMethodController::class);
        Route::get('payment-methods/restore/one/{id}', [PaymentMethodController::class, 'restore'])->name('restorePaymentMethod');
        Route::get('payment-methods/restoreAllPaymentMethods', [PaymentMethodController::class, 'restoreAll'])->name('restoreAllPaymentMethods');

        /********************************* Teachers **************************************/
        Route::resource('teachers', TeacherController::class);
        Route::get('teachers/restore/one/{id}', [TeacherController::class, 'restore'])->name('restoreTeacher');
        Route::get('teachers/restoreAllTeachers', [TeacherController::class, 'restoreAll'])->name('restoreAllTeachers');

        /********************************* Systems **************************************/
        Route::resource('systems', SystemController::class);
        Route::get('systems/restore/one/{id}', [SystemController::class, 'restore'])->name('restoreSystem');
        Route::get('systems/restoreAllSystems', [SystemController::class, 'restoreAll'])->name('restoreAllSystems');

        /********************************* Subjects **************************************/
        Route::resource('subjects', SubjectController::class);
        Route::get('subjects/restore/one/{id}', [SubjectController::class, 'restore'])->name('restoreSubject');
        Route::get('subjects/restoreAllSubjects', [SubjectController::class, 'restoreAll'])->name('restoreAllSubjects');

        /********************************* Orders **************************************/
        Route::resource('orders', OrderController::class);
        Route::post('filter-teacher', [OrderController::class, 'filterTeacher'])->name('filterTeacher');
        Route::post('filter-status', [OrderController::class, 'filterStatus'])->name('filterStatus');
        Route::post('filter-subject', [OrderController::class, 'filterSubject'])->name('filterSubject');
        Route::post('date-search', [OrderController::class, 'dateSearch'])->name('dateSearch');

        /********************************* Fines **************************************/
        Route::resource('fines', FineController::class);
        Route::get('paid/{id}', [FineController::class, 'paid'])->name('paid');
        Route::get('unpaid/{id}', [FineController::class, 'unpaid'])->name('unpaid');

        /********************************* Fine Types **************************************/
        Route::resource('fine-types', FineTypeController::class);

        /**************************** Users & Roles *******************************/
        Route::resource('users', UserController::class);
        Route::get('/users/profile/{id}', [UserController::class, 'showProfile'])->name('showProfile');
        Route::get('/users/{id}/profile', [UserController::class, 'editProfile'])->name('editProfile');
        Route::put('/users/profile/{id}', [UserController::class, 'profile'])->name('profile');
        Route::resource('roles', RoleController::class);

        /**************************** Settings *******************************/
        Route::resource('settings', SettingController::class);

//        //================= this route for change language ( ar - en ) ===================//
//        Route::get('lang/{lang}', function ($lang) {
//            session()->has('lang') ? session()->forget('lang') : '';
//            $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
//            return back();
//        })->name('lang');
    });
});

Route::get('lang/{lang}', function ($lang) {
    session()->has('lang') ? session()->forget('lang') : '';
    $lang === 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
    return back();
})->name('lang');
