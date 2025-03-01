

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Detail Program Magang</h2>
    <div class="card">
        <div class="card-header">
            <h3><?php echo e($internship->name); ?></h3>
        </div>
        <div class="card-body">
            <p><strong>Deskripsi:</strong> <?php echo e($internship->description); ?></p>
            <p><strong>Lokasi:</strong> <?php echo e($internship->location); ?></p>
            <p><strong>Tanggal Mulai:</strong> <?php echo e($internship->start_date); ?></p>
            <p><strong>Tanggal Selesai:</strong> <?php echo e($internship->end_date); ?></p>
            <a href="<?php echo e(route('internships.index')); ?>" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/show.blade.php ENDPATH**/ ?>