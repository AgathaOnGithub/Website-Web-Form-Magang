

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="fw-bold text-primary">Dashboard Pembimbing</h1>
            <p class="text-muted">Selamat datang, <?php echo e(Auth::user()->name); ?>!</p>
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
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <a href="<?php echo e(route('profile.view', ['id' => $user->id])); ?>" class="btn btn-outline-info btn-sm">Lihat Profil</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($application->user->name); ?></td>
                            <td><?php echo e($application->internship->title); ?></td>
                            <td>
                                <span class="badge <?php echo e($application->status == 'Diterima' ? 'bg-success' : 'bg-warning'); ?>">
                                    <?php echo e($application->status); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($task->user->name); ?></td>
                            <td><?php echo e($task->title); ?></td>
                            <td>
                                <span class="badge <?php echo e($task->status == 'Selesai' ? 'bg-success' : 'bg-danger'); ?>">
                                    <?php echo e($task->status); ?>

                                </span>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/dashboard/pembimbing.blade.php ENDPATH**/ ?>