<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('admin.films.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'description' => 'required|string',
        'duration' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Menyimpan gambar
    $imagePath = $request->file('image')->store('images', 'public');

    // Membuat film baru
    Film::create([
        'title' => $request->title,
        'genre' => $request->genre,
        'description' => $request->description,
        'duration' => $request->duration,
        'image' => $imagePath, // Simpan path gambar
    ]);

    return redirect()->route('films.index')->with('success', 'Film berhasil ditambahkan!');
}
}
