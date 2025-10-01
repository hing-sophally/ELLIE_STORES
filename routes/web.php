<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPassword;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::get('/user-login', [LoginController::class, 'login']);
Route::post('/doLogin', [LoginController::class, 'doLogin']);
Route::post('/doRegister', [LoginController::class, 'doRegister']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/forgotPassword', [ForgotPassword::class, 'showForm'])->name('password.request');
// Route::post('/forgotPassword', [ForgotPassword::class, 'sendResetLink'])->name('password.email');
// Route::get('/resetPassword/{token}', [ForgotPassword::class, 'showResetForm'])->name('password.reset');
// Route::post('/resetPassword', [ForgotPassword::class, 'resetPassword'])->name('password.update');
Route::get('/verify-otp', [LoginController::class, 'showOtpForm'])->name('otp.form');
Route::post('/verify-otp', [LoginController::class, 'verifyOtp'])->name('otp.verify');
Route::get('/otp/resend', [LoginController::class, 'resendOtp'])->name('otp.resend');

// Forgot password
Route::get('/user/forgot-password', [ForgotPassword::class, 'showForm'])->name('password.request');
Route::post('/user/forgot-password', [ForgotPassword::class, 'sendResetLink'])->name('password.email');

// Reset password
Route::get('/user/reset-password/{token}', [ForgotPassword::class, 'showResetForm'])->name('password.reset');
Route::post('/user/reset-password', [ForgotPassword::class, 'resetPassword'])->name('password.update');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/index', [AdminDashboardController::class, 'dashboardIndex'])->name('dashboard.index');

    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy',
        'show' => 'admin.categories.show', // optional
    ]);
    Route::resource('products', ProductController::class)->names([
        'index' => 'admin.products.index',
        'create' => 'admin.products.create',
        'store' => 'admin.products.store',
        'edit' => 'admin.products.edit',
        'update' => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
        'show' => 'admin.products.show', // optional
    ]);
    Route::resource('orders', OrderController::class)->names([
        'index' => 'admin.orders.index',
        'show' => 'admin.orders.show',
        'edit' => 'admin.orders.edit',
        'update' => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
    ]);

      Route::get('orders/pending', [OrderController::class, 'pending'])->name('admin.orders.pending');
    Route::get('orders/processing', [OrderController::class, 'processing'])->name('admin.orders.processing');
    Route::get('orders/completed', [OrderController::class, 'completed'])->name('admin.orders.completed');
    Route::get('orders/cancelled', [OrderController::class, 'cancelled'])->name('admin.orders.cancelled');

}); 
