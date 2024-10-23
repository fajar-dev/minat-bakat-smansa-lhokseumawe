<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\masterDataController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::prefix('/assessment')->group(function () {
    Route::get('/student', [AssessmentController::class, 'student'])->name('assessment.student')->middleware(['auth', 'isCompletedUser', 'role:user']);
    Route::get('/general', [AssessmentController::class, 'general'])->name('assessment.general');
    Route::post('/submit', [AssessmentController::class, 'studentSubmit'])->name('assessment.submit');
    Route::get('/{id}/result', [AssessmentController::class, 'result'])->name('assessment.result');
});

Route::prefix('/auth')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerSubmit'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgotSubmit'])->name('forgot.submit');
    Route::get('/forget/{token}/reset', [AuthController::class, 'reset'])->name('reset');
    Route::post('/forget/{token}/reset', [AuthController::class, 'resetSubmit'])->name('reset.submit');
})->middleware(['guest']);

Route::prefix('/auth')->middleware(['auth', 'notCompletedUser', 'role:user'])->group(function () {
    Route::get('/register/completed', [AuthController::class, 'registrationCompleted'])->name('registration.completed');
    Route::post('/register/completed', [AuthController::class, 'registrationCompletedSubmit'])->name('registration.completed.submit');
});
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'isCompletedUser']);

Route::prefix('/organization')->group(function () {
    Route::group(['middleware' => ['auth', 'isCompletedUser', 'role:user']], function () {
        Route::get('/', [OrganizationController::class, 'index'])->name('organization');
        Route::post('/', [OrganizationController::class, 'store'])->name('organization.store');
    });
    Route::get('/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy')->middleware('auth');
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/{id}/data', [OrganizationController::class, 'data'])->name('organization.data');
    });
});

Route::prefix('/master-data')->group(function () {
    Route::get('/organization', [masterDataController::class, 'organization'])->name('master-data.organization');
    Route::get('/question', [masterDataController::class, 'question'])->name('master-data.question');
    Route::get('/intelligence-type', [masterDataController::class, 'intelligenceType'])->name('master-data.intelligence-type');
})->middleware(['auth', 'role:admin']);

Route::prefix('/student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student');
    Route::get('/{id}/detail', [StudentController::class, 'detail'])->name('student.detail');
    Route::get('/{id}/assessment', [StudentController::class, 'assessment'])->name('student.assessment');
    Route::get('/{id}/organization', [StudentController::class, 'organization'])->name('student.organization');
})->middleware(['auth', 'role:admin']);

Route::prefix('/result')->group(function () {
    Route::get('/', [ResultController::class, 'index'])->name('result');
    Route::get('/export', [ResultController::class, 'export'])->name('result.export');
})->middleware(['auth', 'role:admin']);

Route::prefix('/user')->group(function () {
    Route::get('/', [UserController::class, 'user'])->name('user');
    Route::post('/', [UserController::class, 'store'])->name('user.store');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
})->middleware(['auth', 'role:admin']);

Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::post('/', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    Route::post('/signin-method', [ProfileController::class, 'signinUpdate'])->name('profile.signin');
    Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
})->middleware(['auth']);
