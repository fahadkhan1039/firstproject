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