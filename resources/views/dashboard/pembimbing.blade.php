@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="fw-bold text-primary">Dashboard Pembimbing</h1>
            <p class="text-muted">Selamat datang, {{ Auth::user()->name }}!</p>
        </div>
    </div>

    <!-- Daftar Mahasiswa -->
    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <h2 class="fw-bold text-dark">Daftar Mahasiswa Magang</h2>
            <table class="table table-hover">
                <thead>
                    <tr class="table-secondary">
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('profile.view', ['id' => $user->id]) }}" class="btn btn-outline-info btn-sm">Lihat Profil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Status Pendaftaran Magang -->
    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <h2 class="fw-bold text-dark">Status Pendaftaran Magang</h2>
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th>Nama</th>
                        <th>Program Magang</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $application)
                        <tr>
                            <td>{{ $application->user->name }}</td>
                            <td>{{ $application->internship->title }}</td>
                            <td>
                                <span class="badge {{ $application->status == 'Diterima' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $application->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tugas Mahasiswa -->
    <div class="card shadow-lg mt-4">
        <div class="card-body">
            <h2 class="fw-bold text-dark">Tugas Mahasiswa</h2>
            <table class="table table-hover">
                <thead>
                    <tr class="table-warning">
                        <th>Nama</th>
                        <th>Judul Tugas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->user->name }}</td>
                            <td>{{ $task->title }}</td>
                            <td>
                                <span class="badge {{ $task->status == 'Selesai' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $task->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
