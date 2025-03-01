@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center text-primary fw-bold">User Dashboard</h1>
    <p class="text-center">Selamat datang, {{ Auth::user()->name }}!</p>

    <!-- Section Program Magang -->
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Program Magang</h4>
                    <p class="card-text">
                        Adalah strategi pemasaran yang menggunakan media digital untuk mempromosikan produk atau layanan. Digital marketing juga dikenal sebagai online marketing.
                    </p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title fw-bold">Digital Marketing</h4>
                    <p class="card-text">
                        Adalah kegiatan pemasaran yang dilakukan secara online dengan teknologi digital. Tujuannya untuk meningkatkan promosi dan penjualan.
                    </p>
                    <a href="#" class="btn btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Section Status Pendaftaran -->
    <div class="mt-5">
        <h3 class="fw-bold">Status Pendaftaran</h3>
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered">
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

    <!-- Tombol Menuju Halaman Tugas -->
    <div class="text-center mt-4">
        <a href="{{ route('tasks.index') }}" class="btn btn-lg btn-warning fw-bold">
            📋 Lihat Tugas
        </a>
    </div>
</div>
@endsection
