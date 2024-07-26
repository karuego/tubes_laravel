<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route::get('/logout', function() {
//     Auth::logout();
//     return 'logout';
// })->name('logout');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [FilmController::class, 'index'])->name('films.index');
Route::get('/tickets/create/{film}', [TicketController::class, 'create'])->name('tickets.create');
Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

Route::get('/my-tickets', [TicketController::class, 'index'])->middleware('auth')->name('my-tickets');


Route::get('/admin/films/create', [FilmController::class, 'create'])->middleware('auth')->name('films.create');
Route::post('/admin/films', [FilmController::class, 'store'])->name('films.store');
