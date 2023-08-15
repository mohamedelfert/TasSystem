<?php

use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Teacher\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {

    Route::post('new-order', [MainController::class, 'newOrder']);

    Route::post('paytabs/pay-success',[OrderController::class, 'orderPaySuccess'])->name('pay_success');

});
