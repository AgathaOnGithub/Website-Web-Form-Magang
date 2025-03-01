

<?php $__env->startSection('title', 'Telkom Internships'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <!-- Hero Section -->
    <header class="hero-section text-center">
        <h1>Software Manajemen Magang</h1>
        <p>Solusi terbaik untuk mengelola tugas dan aktivitas magang Anda.</p>
        <a href="<?php echo e(route('internships.create')); ?>" class="btn btn-light btn-lg">Lihat Program Magang</a>
    </header>

    <!-- Fitur Utama -->
    <section class="features text-center mt-5">
        <h2 class="mb-4">Fitur Utama</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Manajemen Tugas</h4>
                    <p>Mengelola tugas harian dengan mudah dan efisien.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Pelaporan Kinerja</h4>
                    <p>Melihat dan melaporkan progres magang dengan cepat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <h4>Notifikasi Otomatis</h4>
                    <p>Mendapatkan pengingat otomatis untuk setiap tugas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Perusahaan -->
    <div class="mt-5 p-4 bg-light rounded shadow-sm">
        <h3 class="text-center font-weight-bold">Tentang Perusahaan</h3>
        <h5>
            Telkom adalah bagian dari Badan Usaha Milik Negara (BUMN) yang bergerak di bidang layanan teknologi informasi, komunikasi, serta telekomunikasi digital di Indonesia.
            PT. Telkom Indonesia juga menyediakan layanan multimedia, internet, dan lainnya.
        </h5>
    </div>

    <!-- Chart Pendaftaran -->
    <section class="chart-section mt-5">
        <h2 class="text-center">Jumlah Pendaftar Magang</h2>
        <div class="d-flex justify-content-center">
            <div style="width: 80%; max-width: 600px;">
                <canvas id="internshipChart"></canvas>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .hero-section {
        max-width: 900px;
        margin: 50px auto;
        padding: 50px 20px;
        background: #a83232;
        color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    }

    .feature-card {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .chart-section {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .chart-section canvas {
        max-width: 100% !important;
        height: auto !important;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var canvas = document.getElementById('internshipChart');
        if (!canvas) {
            console.error("Canvas tidak ditemukan!");
            return;
        }

        var ctx = canvas.getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: [120, 150, 180, 200, 250, 300],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Pendaftar'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/home.blade.php ENDPATH**/ ?>