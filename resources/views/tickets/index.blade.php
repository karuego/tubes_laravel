@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Daftar Tiket Saya</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Film</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Tiket</th>
                <th>Jadwal Tayang</th>
                <th>Tanggal Tayang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->film->title }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->quantity }}</td>
                    <td>{{ $ticket->film->schedule }}</td>
                    <td>{{ \Carbon\Carbon::parse($ticket->film->release_date)->format('d-m-Y') }}</td>
                    <td>
                        <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($tickets->isEmpty())
        <div class="alert alert-danger mt-3">
            Anda belum membeli tiket.
        </div>
    @endif
</div>
@endsection