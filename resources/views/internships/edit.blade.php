@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Program Magang</h1>
    <form action="{{ route('internships.update', $internship->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="name">Nama Program</label>
            <input type="text" name="name" class="form-control" value="{{ $internship->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required>{{ $internship->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
