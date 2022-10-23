<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PagesController;
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

Route::get('/oglasi/kreiraj', [PagesController::class, 'create'])->name('posts.create')->middleware('auth');
Route::put('/oglasi/kreiraj', [PostController::class, 'store']);


Route::get('/korisnici/{user:id}',  [RegisteredUserController::class, 'userPage'])->name('user')->middleware('creator');

Route::get('/oglasi', [PostController::class, 'index'])->name('homepage');

Route::get('/oglasi/{post:slug}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
