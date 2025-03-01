@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Program Magang</h4>
            @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{ route('internships.create') }}" class="btn btn-light">Tambah Magang</a>
            @endif
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            @if($internships->isEmpty())
                <p class="text-center text-muted">Belum ada program magang yang tersedia.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($internships as $internship)
                            <tr>
                                <td>{{ $internship->name }}</td>
                                <td>{{ Str::limit($internship->description, 50) }}</td>
                                <td>{{ $internship->location }}</td>
                                <td>{{ $internship->start_date }} - {{ $internship->end_date }}</td>
                                <td>
                                    <a href="{{ route('internships.show', $internship->id) }}" class="btn btn-info btn-sm">Detail</a>

                                    @if(auth()->check() && auth()->user()->role === 'admin')
                                        <a href="{{ route('internships.edit', $internship->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('internships.destroy', $internship->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
