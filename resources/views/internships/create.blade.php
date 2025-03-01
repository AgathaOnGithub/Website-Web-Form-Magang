@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Program Magang</h2>
    <form action="{{ route('internships.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Program</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('internships.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
