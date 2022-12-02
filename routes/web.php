<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NaseljaController;
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
})->name('pocetna');

Route::get('/o-nama', [PagesController::class, 'oNama'])->name('o-nama');

Route::get('/pravila-i-uslovi-koriscenja', [PagesController::class, 'usloviKoriscenja'])->name('pravila-i-uslovi-koriscenja');

Route::get('/politika-privatnosti', [PagesController::class, 'politikaPrivatnosti'])->name('politika-privatnosti');

Route::get('/oglasi/kreiraj', [PagesController::class, 'create'])->name('posts.create')->middleware('auth', 'verified');

Route::get('/korisnici/{user:id}',  [RegisteredUserController::class, 'userPage'])->name('user')->middleware('not.admin');

Route::get('/admini/{user:id}',  [RegisteredUserController::class, 'adminPage'])->name('admin')->middleware('admin', 'not.admin.owner');

Route::get('/oglasi', [PostController::class, 'index'])->name('homepage');

Route::get('/oglasi/{post:slug}', [PostController::class, 'show'])->name('posts.show')->middleware('approved');

Route::get('/oglasi/{post:slug}/edit', [PagesController::class, 'edit'])->name('posts.edit')->middleware('owner');

Route::put('/oglasi/{post:slug}/edit', [PostController::class, 'update']);

Route::get('/zaboravljena-sifra', [PagesController::class, 'forgotPassword'])->name('forgot-password')->middleware('guest');

require __DIR__.'/auth.php';
