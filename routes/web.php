<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\masterDataController;

Route::get('/', function () {
    return view('main.index');
})->name('home');

Route::prefix('/assessment')->group(function () {
    Route::get('/student', [AssessmentController::class, 'student'])->name('assessment.student')->middleware(['auth', 'isCompletedUser']);
    Route::get('/general', [AssessmentController::class, 'general'])->name('assessment.general');
    Route::post('/submit', [AssessmentController::class, 'studentSubmit'])->name('assessment.submit');
    Route::get('/{id}/result', [AssessmentController::class, 'result'])->name('assessment.result');
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

Route::prefix('/auth')->middleware(['auth', 'notCompletedUser'])->group(function () {
    Route::get('/register/completed', [AuthController::class, 'registrationCompleted'])->name('registration.completed');
    Route::post('/register/completed', [AuthController::class, 'registrationCompletedSubmit'])->name('registration.completed.submit');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('isCompletedUser');

Route::prefix('/master-data')->middleware(['auth'])->group(function () {
    Route::get('/organization', [masterDataController::class, 'organization'])->name('master-data.organization');
    Route::get('/question', [masterDataController::class, 'question'])->name('master-data.question');
    Route::get('/intelligence-type', [masterDataController::class, 'intelligenceType'])->name('master-data.intelligence-type');
});


