<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\PayPalController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ApplicationController;

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

Route::get('/app', [FrontendController::class, 'index'])->name('app');
Route::get('/', [FrontendController::class, 'application'])->name('application');
Route::post('/application/store', [FrontendController::class, 'application_store'])->name('application.store');
Route::get('/home', [FrontendController::class, 'application'])->name('home');
Route::get('/view', [FrontendController::class, 'application_view'])->name('application_view');
Route::get('/countries', [FrontendController::class, 'countries'])->name('countries');
Route::get('/app-view/{reference_id}', [FrontendController::class, 'view'])->name('view');
Route::get('/viewReference', [FrontendController::class, 'viewReference'])->name('viewReference');

Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index']);

Route::middleware(['auth', 'user-access:administrator,admin,moderator'])->name('admin.')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::controller(SettingController::class)->name('setting.')->prefix('setting')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
    });

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

    Route::controller(CountryController::class)->name('country.')->prefix('country')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::controller(ServiceController::class)->name('service.')->prefix('service')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::get('/service/{id}', 'service')->name('service');
    });

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

Route::controller(FrontendController::class)->name('user.')->prefix('user')->group(function () {
    Route::get('/index', 'index')->name('index');
    // Route::post('/store', 'store')->name('store');
    Route::get('/application', 'application')->name('application');
    Route::post('/application-store', 'application_store')->name('application_store');
});

Route::controller(PayPalController::class)->name('paypal.')->prefix('paypal')->group(function () {
    Route::post('paypal/payment', 'paypal')->name('payment');
    Route::get('paypal/payment/success', 'success')->name('success');
    Route::get('paypal/payment/cancel', 'cancel')->name('cancel');
});
