<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
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

Route::get('/', function(){
    return view('homepage');
});

Route::get('/korisnici/{user:id}/oglasi',  [RegisteredUserController::class, 'userPage'])->name('user');

Route::get('/oglasi', [PostController::class, 'index'])->name('homepage');

Route::get('/oglasi/{post:slug}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
