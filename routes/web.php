<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login-post', [AuthController::class, 'loginPost'])->name('login-post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/post-register', [AuthController::class, 'postRegister'])->name('post-register');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/show/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
