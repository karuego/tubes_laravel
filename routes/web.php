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

Route::controller(BookController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::post('/books', 'all')->name('books.all');
});

// Auth
Auth::routes();

// Admin
Route::middleware(['auth', 'auth:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    });




});


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
Route::get('/perpus/admin/set', function() {return view('perpus.setadmin');});
Route::get('/perpus/admin/crew', function() {return view('perpus.crewadmin');});
Route::get('/perpus/admin/lapinjam', function() {return view('perpus.lapinjamadmin');});
Route::get('/perpus/admin/databuku', function() {return view('perpus.databukuadmin');});
Route::get('/perpus/admin/peminjaman', function() {return view('perpus.peminjamanadmin');});
