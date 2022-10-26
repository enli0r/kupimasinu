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

Route::get('/korisnici/{user:id}',  [RegisteredUserController::class, 'userPage'])->name('user')->middleware('creator');

Route::get('/oglasi', [PostController::class, 'index'])->name('homepage');

Route::get('/oglasi/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/oglasi/{post:slug}/edit', [PagesController::class, 'edit'])->name('posts.edit')->middleware('owner');
Route::put('/oglasi/{post:slug}/edit', [PostController::class, 'update']);

Route::post('/oglasi/{post:slug}/delete', [PostController::class, 'destroy'])->name('posts.delete')->middleware('owner');

require __DIR__.'/auth.php';
