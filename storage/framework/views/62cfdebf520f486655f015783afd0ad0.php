<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Telkom Internships'); ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    
    <?php echo $__env->yieldPushContent('styles'); ?>

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
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('logo.png')); ?>" alt="Telkom Internships" class="navbar-brand-logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('internships.index')); ?>">Program Magang</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('contact')); ?>">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('about')); ?>">Tentang</a></li>
                    
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <span class="text-white fw-bold mx-3">Selamat Datang, <?php echo e(Auth::user()->name); ?> (<?php echo e(ucfirst(Auth::user()->role)); ?>)</span>
                        </li>

                        <li class="nav-item">
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-warning btn-sm mx-2">Dashboard Admin</a>
                            <?php elseif(Auth::user()->role == 'pembimbing'): ?>
                                <a href="<?php echo e(route('pembimbing.dashboard')); ?>" class="btn btn-primary btn-sm mx-2">Dashboard Pembimbing</a>
                            <?php elseif(Auth::user()->role == 'user'): ?>
                                <a href="<?php echo e(route('user.dashboard')); ?>" class="btn btn-success btn-sm mx-2">Dashboard</a>
                            <?php endif; ?>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-danger btn-sm" href="<?php echo e(route('logout')); ?>" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-light btn-sm" href="<?php echo e(route('login')); ?>">Masuk/Daftar</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer>
        <p>Jalan Mesjid no. 1 Kota Sukabumi 43111 Sukabumi, West Java | 📞 +62523000843 | 📧 @telkomindonesia</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\laragon\www\dashboard-magang\resources\views/layouts/app.blade.php ENDPATH**/ ?>