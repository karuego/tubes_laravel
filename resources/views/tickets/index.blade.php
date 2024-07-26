@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')
    <h1>Tiket Saya</h1>

    @if ($tickets->isEmpty())
        <p>Anda belum memesan tiket.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Film</th>
                    <th>Genre</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Tanggal Dipesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->film->title }}</td>
                        <td>{{ $ticket->film->genre }}</td>
                        <td>{{ $ticket->film->description }}</td>
                        <td>{{ $ticket->quantity }}</td>
                        <td>{{ $ticket->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection