<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest.check')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.action');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.action');
    Route::get('lost-password', [AuthController::class, 'lostPassword'])->name('lost-password');
});

Route::middleware('auth.check')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile_update', [ProfileController::class, 'profile_action'])->name('profile.profile_update');
    Route::put('password_update', [ProfileController::class, 'password_update'])->name('profile.password_update');

    Route::get('/category/trash', [CategoryController::class, 'trash'])->name('category.trash');
    Route::get('/category/restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::delete('/category/forceDelete/{category}', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    Route::resource('category', CategoryController::class);

    Route::get('/payment/trash', [PaymentController::class, 'trash'])->name('payment.trash');
    Route::get('/payment/restore/{payment}', [PaymentController::class, 'restore'])->name('payment.restore');
    Route::delete('/payment/forceDelete/{payment}', [PaymentController::class, 'forceDelete'])->name('payment.forceDelete');
    Route::resource('payment', PaymentController::class);

    Route::get('/transaction/trash', [TransactionController::class, 'trash'])->name('transaction.trash');
    Route::get('/transaction/restore/{transaction}', [TransactionController::class, 'restore'])->name('transaction.restore');
    Route::delete('/transaction/forceDelete/{transaction}', [TransactionController::class, 'forceDelete'])->name('transaction.forceDelete');
    Route::resource('transaction', TransactionController::class);

    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});



