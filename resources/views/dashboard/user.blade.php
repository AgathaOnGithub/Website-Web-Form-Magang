@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-primary fw-bold">User Dashboard</h1>
    <p class="text-center">Selamat datang, {{ Auth::user()->name }}!</p>

    <!-- Status Pendaftaran -->
    <div class="mt-4">
        <h3 class="fw-bold">Status Pendaftaran</h3>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Program Magang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Digital Marketing</td>
                            <td class="text-center"><span class="badge bg-success">Diterima</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Upload Dokumen & Tombol Lihat Tugas -->
<div class="mt-5 mb-5"> <!-- Tambahkan mb-5 di sini -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold mb-0">Upload Dokumen</h3>
        <a href="{{ route('tasks.index') }}" class="btn btn-lg btn-warning fw-bold d-flex align-items-center">
            📋 Lihat Tugas
        </a>
    </div>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('user.uploadDocument') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="cv" class="form-label fw-bold">Upload CV (PDF/DOCX)</label>
                    <input type="file" class="form-control" name="cv" id="cv" accept=".pdf,.doc,.docx" required>
                </div>
                <div class="mb-3">
                    <label for="formulir" class="form-label fw-bold">Upload Formulir (PDF/DOCX)</label>
                    <input type="file" class="form-control" name="formulir" id="formulir" accept=".pdf,.doc,.docx" required>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success fw-bold px-4">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
