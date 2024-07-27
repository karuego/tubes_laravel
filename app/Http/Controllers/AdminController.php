<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        $tickets = Ticket::with('film', 'user') // Memuat relasi user
            ->when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->whereHas('user', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%"); // Menggunakan nama pengguna
                });
            })
            ->get();

        return view('admin.tickets.index', compact('tickets', 'query'));
    }

    
}
