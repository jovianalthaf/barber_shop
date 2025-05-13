<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CapsterController;
use App\Http\Controllers\CapstersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
// HomeController
Route::get('/', [HomeController::class, 'index']);

// AuthController
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/admin/capsters', CapsterController::class);
    Route::resource('/admin/services', ServiceController::class);
    // parameters([
    //     'capsters' => 'capster:slug'
    // ]);
    // Route::resource('/admin/services', ServiceController::class);
    // Route::resource('/admin/transactions', TransactionController::class);
    // Route::get('/admin/settings', [SettingController::class, 'index'])->name('settings.index');

});
