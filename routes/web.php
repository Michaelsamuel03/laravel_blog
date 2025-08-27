<?php

/* use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 */
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Auth
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Posts
//-----------------
Route::get('/', fn() => redirect('/posts'));
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
/* Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); */

// protected routes
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});
