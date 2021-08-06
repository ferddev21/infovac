<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VaksinsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MemberPostController;
use App\Http\Controllers\SocialMediaAuthController;

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
Route::get('/post/{id}', [PageController::class, 'postView'])->name('post.view');
Route::get('/search', [PageController::class, 'search'])->name('search');

//route for address
Route::post('/address/city', [AddressController::class, 'city'])->name('address.city');
Route::post('/address/district', [AddressController::class, 'district'])->name('address.district');

//Ke halaman dashboard
// Route::get('/admin', function () {
//     return redirect()->route('admin.index');
// });


//Ke halaman admin 



//auth route
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::post('/login/procces', [AuthController::class, 'login'])->name('login.process');
Route::get('/auth/register', [AuthController::class, 'register'])->name('register');
Route::post('/register/procces', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//social media auth route
Route::get('/auth/google', [SocialMediaAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [SocialMediaAuthController::class, 'handleGooleCallback'])->name('login.google.callback');

Route::group(
    ['middleware' => ['auth']],
    function () {
        //admin route
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

        Route::get('/admin/setting/{id}', [AdminController::class, 'edit'])->name('admin.setting');
        Route::post('/admin/setting/update/{id}', [AdminController::class, 'update'])->name('admin.update');

        Route::get('/admin/vaksin', [VaksinsController::class, 'index'])->name('vaksin.index');
        Route::get('/admin/vaksin/tambah', [VaksinsController::class, 'create'])->name('vaksin.tambah');
        Route::post('/admin/vaksin/store', [VaksinsController::class, 'store'])->name('vaksin.store');
        Route::get('/admin/vaksin/edit/{id}', [VaksinsController::class, 'edit'])->name('vaksin.edit');
        Route::post('/admin/vaksin/update/{id}', [VaksinsController::class, 'update'])->name('vaksin.update');
        Route::get('/admin/vaksin/delete/{id}', [VaksinsController::class, 'destroy'])->name('vaksin.delete');
        
        
        Route::get('/admin/posts', [PostsController::class, 'index'])->name('posts.index');
        Route::get('/admin/posts/{id}', [PostsController::class, 'detail'])->name('posts.detail');
        Route::post('/admin/posts/update/{id}', [PostsController::class, 'update'])->name('posts.update');
        Route::get('/admin/posts/delete/{id}', [PostsController::class, 'destroy'])->name('posts.delete');
 
        Route::get('/admin/user', [UserController::class, 'index'])->name('member.index');
        Route::get('/admin/user/tambah', [UserController::class, 'create'])->name('member.tambah');
        Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('member.edit');
        Route::get('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('member.delete');
        Route::post('/admin/user/store', [UserController::class, 'store'])->name('member.store');
        Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('member.update');
       
        

        //member route
        Route::get('/member/account', [MemberController::class, 'index'])->name('member.account');
        Route::post('/member/account/update', [MemberController::class, 'update'])->name('member.account.update');
        Route::post('/member/account/update-password', [MemberController::class, 'updatePassword'])->name('member.account.update_password');

        Route::get('/member/posts', [MemberPostController::class, 'index'])->name('member.post.index');
        Route::get('/member/posts/add', [MemberPostController::class, 'add'])->name('member.post.add');
        Route::post('/member/posts/create', [MemberPostController::class, 'create'])->name('member.post.create');
        Route::get('/member/posts/{id}/edit', [MemberPostController::class, 'edit'])->name('member.post.edit');
        Route::post('/member/posts/update', [MemberPostController::class, 'update'])->name('member.post.update');
        Route::post('/member/posts/delete', [MemberPostController::class, 'delete'])->name('member.post.delete');

        Route::get('/member', function () {
            return redirect()->route('member.post.index');
        });
    }
);
