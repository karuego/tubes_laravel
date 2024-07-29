<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;

use App\Models\Book;
use App\Models\User;

Route::get('/', [BookController::class, 'index'])->name('index');
Route::get('/books', [BookController::class, 'all'])->name('books.all');

// Admin
Route::get('/admin/books/create', [BookController::class, 'create'])->middleware('auth')->name('books.create');
Route::post('/admin/books', [BookController::class, 'store'])->name('books.store');
Route::delete('/admin/books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
// End Admin

// Login
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// END Login





// -------------------------------
// Perpus
Route::get('/perpus', function() {return view('perpus.index');})->name('perpus');
Route::get('/perpus/buku', function() {return view('perpus.buku');});
Route::get('/perpus/caribuku', function() {return view('perpus.caribuku', ['films' => []]);});
Route::get('/perpus/bukupengunjung', function() {return view('perpus.bukupengunjung');});
Route::get('/perpus/admin', function() {
    $book_count = Book::count();
    $user_count = User::count();
    return view('perpus.admin', compact('book_count', 'user_count'));
});
Route::get('/perpus/setadmin', function() {return view('perpus.setadmin');});
Route::get('/perpus/crewadmin', function() {return view('perpus.crewadmin');});
Route::get('/perpus/lapinjamadmin', function() {return view('perpus.lapinjamadmin');});
Route::get('/perpus/databukuadmin', function() {return view('perpus.databukuadmin');});
Route::get('/perpus/peminjamanadmin', function() {return view('perpus.peminjamanadmin');});
