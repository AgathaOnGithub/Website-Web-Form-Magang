@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4"><i class="fas fa-folder-open"></i> Daftar Tugas</h2>

    <!-- Tombol Upload -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Upload Tugas
        </a>
    </div>

    <!-- Tabel Tugas -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0 text-center">Tugas yang Telah Diupload</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 25%;">Judul</th>
                            <th style="width: 35%;">Deskripsi</th>
                            <th style="width: 15%;">File</th>
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'pembimbing' || Auth::user()->role == 'user')
                            <th style="width: 25%;">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a href="{{ asset('storage/' . $task->file_path) }}" class="btn btn-info btn-sm" target="_blank">
                                    <i class="fas fa-file-alt"></i> Lihat File
                                </a>
                            </td>
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'pembimbing' || Auth::user()->role == 'user')
                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus tugas ini?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
