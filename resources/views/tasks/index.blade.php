@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">📂 Daftar Tugas</h1>

    <!-- Tombol Upload Tugas -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#uploadTaskModal">
        ➕ Upload Tugas
    </button>

    <!-- Tabel Daftar Tugas -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Tugas yang Telah Diupload</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a href="{{ asset('storage/tasks/' . $task->file) }}" target="_blank" class="btn btn-sm btn-info">
                                    📄 Lihat File
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        ❌ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Upload Tugas -->
<div class="modal fade" id="uploadTaskModal" tabindex="-1" aria-labelledby="uploadTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadTaskModalLabel">Upload Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Judul Tugas</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File (PDF, Word, Gambar)</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".pdf,.doc,.docx,.jpg,.png" required>
                    </div>
                    <button type="submit" class="btn btn-success">📤 Unggah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
