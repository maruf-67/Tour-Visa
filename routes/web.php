<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PayPalController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SendMailController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ApplicationController;
use App\Http\Controllers\Backend\TransactionController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {

    Route::get('/home', 'index')->name('home');
    Route::post('/order/store', 'store')->name('order.store');
    Route::get('/', 'index');

});


Route::middleware(['auth', 'user-access:administrator,admin,moderator'])->name('admin.')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::controller(ApplicationController::class)->name('application.')->prefix('application')->group(function () {
        Route::get('/approved', 'approved')->name('approved');
        Route::get('/view/{id}', 'view')->name('view');
        Route::get('/onhold', 'onhold')->name('onhold');
        Route::get('/paid', 'paid')->name('paid');
        Route::get('/processing', 'processing')->name('processing');
        Route::get('/rejected', 'rejected')->name('rejected');
        Route::get('/today', 'today')->name('today');
        Route::get('/last-week', 'last_week')->name('last_week');
        Route::get('/last-month', 'last_month')->name('last_month');
        Route::get('/last-year', 'last_year')->name('last_year');
        Route::get('/report', 'report')->name('report');
        Route::get('/unpaid', 'unpaid')->name('unpaid');
        Route::get('/unpaid', 'unpaid')->name('unpaid');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/destroy/{id}', 'destroy')->name('destroy');

    });

});

Route::middleware(['auth', 'user-access:administrator,admin'])->name('admin.')->group(function () {


    Route::controller(ServiceController::class)->name('service.')->prefix('service')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/service/{id}', 'service')->name('service');
    });



});


Route::middleware(['auth', 'user-access:administrator'])->name('admin.')->group(function () {

    Route::controller(UserController::class)->name('user.')->prefix('user')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/admin-list', 'admin_user')->name('adminUser');
        Route::get('/create', 'admin_create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/password', 'change_password')->name('password');
        Route::post('/update-password', 'update_password')->name('update_password');
    });

    Route::controller(SettingController::class)->name('setting.')->prefix('setting')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
    });

    Route::controller(CountryController::class)->name('country.')->prefix('country')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');

        route::post('/status/{id}', 'status')->name('status');
    });

    Route::controller(TransactionController::class)->name('transaction.')->prefix('transaction')->group(function () {
        Route::get('/paypal', 'index')->name('transaction');

    });
});


Route::controller(FrontendController::class)->name('user.')->prefix('user')->group(function () {
    Route::get('/index', 'index')->name('index');
    // Route::post('/store', 'store')->name('store');
    // Route::get('/application', 'application')->name('application');
    // Route::post('/application-store', 'application_store')->name('application_store');
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/app', 'index')->name('app');
    Route::get('/application/{ref_id}', 'application')->name('application');
    Route::post('/application/store', 'application_store')->name('application.store');
    Route::get('/view', 'application_view')->name('application_view');
    Route::get('/countries', 'countries')->name('countries');
    Route::get('/app-view/{reference_id}', 'view')->name('view');
    Route::post('/viewReference', 'viewReference')->name('viewReference');
    Route::get('/invoice/{id}', 'invoice')->name('invoice');
});

Route::controller(PayPalController::class)->name('paypal.')->prefix('paypal')->group(function () {
    Route::post('paypal/payment', 'paypal')->name('payment');
    Route::get('paypal/payment/success', 'success')->name('success');
    Route::get('paypal/payment/cancel', 'cancel')->name('cancel');
});

Route::controller(SendMailController::class)->name('mail.')->prefix('mail')->group(function () {
    Route::get('submit/{id}', 'submit_application')->name('submit');
    Route::get('approved/{id}', 'approved_application')->name('approved');
    // Route::get('paypal/payment/success', 'success')->name('success');
    // Route::get('paypal/payment/cancel', 'cancel')->name('cancel');
});
