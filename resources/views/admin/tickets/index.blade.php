@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Tiket</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Film</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Tiket</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->film->title }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection