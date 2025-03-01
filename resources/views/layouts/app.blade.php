<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Telkom Internships')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    @stack('styles')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .navbar {
            background-color: #8B0000;
            padding: 10px 0;
        }
        .navbar-brand-logo {
            height: 40px; /* Sesuaikan ukuran */
            width: auto;
            max-width: 120px; /* Hindari terlalu besar */
        }
        .navbar-nav .nav-link {
            color: white !important;
            margin-right: 15px;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }
        footer {
            background-color: #8B0000;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Telkom Internships" class="navbar-brand-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="{{ route('internships.index') }}">Program Magang</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Tentang</a></li>
                    
                    @auth
                        <li class="nav-item">
                            <span class="text-white fw-bold mx-3">Selamat Datang, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})</span>
                        </li>

                        <li class="nav-item">
                            @if(Auth::user()->role == 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm mx-2">Dashboard Admin</a>
                            @elseif(Auth::user()->role == 'pembimbing')
                                <a href="{{ route('pembimbing.dashboard') }}" class="btn btn-primary btn-sm mx-2">Dashboard Pembimbing</a>
                            @elseif(Auth::user()->role == 'user')
                                <a href="{{ route('user.dashboard') }}" class="btn btn-success btn-sm mx-2">Dashboard</a>
                            @endif
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-danger btn-sm" href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm" href="{{ route('login') }}">Masuk/Daftar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        <p>Jalan Mesjid no. 1 Kota Sukabumi 43111 Sukabumi, West Java | 📞 +62523000843 | 📧 @telkomindonesia</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
