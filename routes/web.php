<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('payment', array('as' => 'payment','uses' => 'App\Http\Controllers\PaypalController@payment',));
// Route::post('cancel', array('as' => 'payment.cancel','uses' => 'App\Http\Controllers\PayPalController@cancel',));
// Route::get('payment/success', array('as' => 'payment.success','uses' => 'App\Http\Controllers\PayPalController@success',));


Route::controller(PaypalController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });