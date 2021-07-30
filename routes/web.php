<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'home'])->name('home');

//Ke halaman admin 
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//ke halaman admin data vaksin 
Route::get('/admin/vaksin', [AdminController::class, 'vaksin'])->name('admin.vaksin');
//ke halaman admin data posts 
Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
//ke halaman admin data posts 
Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');

//login route
Route::get('/auth', [AuthController::class, 'index'])->name('login');
