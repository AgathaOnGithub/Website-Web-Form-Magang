@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4 font-weight-bold">Profil Pembimbing</h2>
    <div class="card shadow border-0 rounded-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if(isset($pembimbing) && $pembimbing->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . $pembimbing->profile_picture) }}" class="rounded-circle" width="150" alt="Foto Profil">
                    @else
                        <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle" width="150" alt="Foto Profil">
                    @endif
                </div>
                <div class="col-md-8">
                    <h4>{{ $pembimbing->name ?? 'Nama tidak tersedia' }}</h4>
                    <p>Email: {{ $pembimbing->email ?? 'Tidak tersedia' }}</p>
                    <p>No. Telepon: {{ $pembimbing->phone ?? 'Tidak tersedia' }}</p>
                    <p>Alamat: {{ $pembimbing->address ?? 'Tidak tersedia' }}</p>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-5">Daftar Peserta Magang</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No. Telepon</th>
                    <th>CV</th>
                    <th>Formulir Pendaftaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone ?? 'Tidak tersedia' }}</td>
                        <td>
                            @if($user->upload && $user->upload->cv)
                                <a href="{{ asset('storage/uploads/cv/' . $user->upload->cv) }}" target="_blank" class="btn btn-primary btn-sm">Lihat CV</a>
                            @else
                                <span class="text-danger">Belum diunggah</span>
                            @endif
                        </td>
                        <td>
                            @if($user->upload && $user->upload->formulir)
                                <a href="{{ asset('storage/uploads/formulir/' . $user->upload->formulir) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Formulir</a>
                            @else
                                <span class="text-danger">Belum diunggah</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
