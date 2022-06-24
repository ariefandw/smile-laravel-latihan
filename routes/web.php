<?php

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

Route::get('/token', function () {
    return csrf_token();
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/download/{id}', [App\Http\Controllers\UserController::class, 'download'])->name('user.download');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resources([
        'post' => \App\Http\Controllers\PostController::class,
        'user' => \App\Http\Controllers\UserController::class,
        'comment' => \App\Http\Controllers\CommentController::class,
    ]);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::resource('post', \App\Http\Controllers\PostController::class)->only([
        'index', 'show'
    ]);
});
require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
