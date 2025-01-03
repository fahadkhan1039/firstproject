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





Route::post('/users', [UserController::class, 'data'])->name('users.data');
Route::get('/view_all_user',[UserController::class,'view_all_user'])->name('view_all_user');
