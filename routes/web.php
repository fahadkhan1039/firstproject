<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('front_end.home');
});
// ->middleware('check')
Route::get('/home', function () {
    return view('admin.dashboard');
});

// route :: redirect('/single-product' , '/product');
// routes/web.php
// Routes for viewing, editing, updating, and deleting users
Route::get('/users', [UserController::class, 'view_all_user'])->name('users.view_all_user');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::post('/users/create', [UserController::class, 'data'])->name('users.create');


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
// use Illuminate\Support\Facades\Route;

// Register routes
Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Login routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Logout route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Home (Dashboard) route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('signin', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('signin');

Route::post('signin', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');


    use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;

// Authentication Routes...
Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Registration Routes...
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Password Reset Routes...
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

// Email Verification Routes...
Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->name('verification.notice');
Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->name('verification.verify');
Route::post('email/verification-notification', [EmailVerificationPromptController::class, 'store'])
    ->name('verification.send');

// Profile Routes...
Route::get('/user/profile', [ProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit');
Route::patch('/user/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update');
Route::delete('/user/profile', [ProfileController::class, 'destroy'])
    ->middleware('auth')
    ->name('profile.destroy');
