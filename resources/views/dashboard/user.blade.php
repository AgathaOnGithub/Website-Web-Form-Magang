@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-primary fw-bold">User Dashboard</h1>
    <p class="text-center">Selamat datang, {{ Auth::user()->name }}!</p>

    <!-- Status Pendaftaran -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="fw-bold">Status Pendaftaran</h3>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Program Magang</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Digital Marketing</td>
                                <td><span class="badge bg-success">Diterima</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Dokumen -->
    <div class="row justify-content-center mt-5 mb-5">  <!-- Tambahkan mb-5 agar tidak terlalu dekat dengan footer -->
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="fw-bold">Upload Dokumen</h3>
                <a href="{{ route('tasks.index') }}" class="btn btn-warning fw-bold">📋 Lihat Tugas</a>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="cv" class="form-label">Upload CV (PDF/DOCX)</label>
                            <input type="file" class="form-control" name="cv" id="cv" required>
                        </div>
                        <div class="mb-3">
                            <label for="formulir" class="form-label">Upload Formulir (PDF/DOCX)</label>
                            <input type="file" class="form-control" name="formulir" id="formulir" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">📤 Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
