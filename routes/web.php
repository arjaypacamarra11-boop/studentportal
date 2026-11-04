<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:6,1')
        ->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::get('/homepage',       [DashboardController::class, 'homepage'])->name('homepage');
    Route::get('/calendar',       [DashboardController::class, 'calendar'])->name('calendar');
    Route::get('/online-classes', [DashboardController::class, 'onlineClasses'])->name('online_classes');

    Route::get('/chat',              [DashboardController::class, 'chat'])->name('chat');
    Route::post('/chat',             [DashboardController::class, 'storeMessage'])->name('chat.store');
    Route::delete('/chat/{message}', [DashboardController::class, 'destroyMessage'])->name('chat.destroy');

    Route::get('/logout',  [DashboardController::class, 'logoutPage'])->name('logout.page');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});