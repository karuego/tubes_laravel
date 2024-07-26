<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('film')->get(); // Ambil semua tiket dengan relasi film
        return view('admin.tickets.index', compact('tickets'));
    }
}
