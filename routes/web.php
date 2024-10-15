<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\masterDataController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/auth')->middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgotSubmit'])->name('forgot.submit');
    Route::get('/forget/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/forget/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('/master-data')->middleware(['auth'])->group(function () {
    Route::get('/organization', [masterDataController::class, 'organization'])->name('master-data.organization');
    Route::get('/question', [masterDataController::class, 'question'])->name('master-data.question');
    Route::get('/intelligence-type', [masterDataController::class, 'intelligenceType'])->name('master-data.intelligence-type');
});
