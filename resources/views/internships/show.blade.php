@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Program Magang</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $internship->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> {{ $internship->description }}</p>
            <p><strong>Lokasi:</strong> {{ $internship->location }}</p>
            <p><strong>Tanggal Mulai:</strong> {{ $internship->start_date }}</p>
            <p><strong>Tanggal Selesai:</strong> {{ $internship->end_date }}</p>
            <a href="{{ route('internships.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
