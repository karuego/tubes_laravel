<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $book_count = Book::count();
        $user_count = User::count();

        return view('index', compact('book_count', 'user_count'));
    }

    public function create()
    {
        return view('admin.add_book');
    }

    public function all(Request $request)
    {
        $_LEN = 10;

        $books = null;
        $search = $request->input('search');
        $search = trim($search);

        if (!empty($search)) {
            $books = Book::query()->when(!empty($search), function ($query) use ($search, $_LEN) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->paginate($_LEN);
            });
        } else if (session()->has('success')) {
            $books = Book::latest()->paginate($_LEN);
        } else {
            $books = Book::paginate($_LEN);
        }

        return view('all_books', compact('books', 'search'));
    }

    public function destroy($id)
    {
        $film = Book::findOrFail($id);
        $film->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('books.all')->with('success', 'Buku berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Menyimpan gambar
        $imagePath = $request->file('image')->store('images', 'public');

        // Membuat Buku baru
        Book::create([
            'title' => $request->title,
            'genre' => $request->genre,
            'description' => $request->description,
            'release_year' => $request->release_year,
            'image' => $imagePath
        ]);

        return redirect()->route('books.all')->with('success', 'Buku berhasil ditambahkan!');
    }
}
