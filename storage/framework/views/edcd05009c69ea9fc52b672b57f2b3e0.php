

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Program Magang</h4>
            <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                <a href="<?php echo e(route('internships.create')); ?>" class="btn btn-light">Tambah Magang</a>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>
            
            <?php if($internships->isEmpty()): ?>
                <p class="text-center text-muted">Belum ada program magang yang tersedia.</p>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Lokasi</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $internships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $internship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($internship->name); ?></td>
                                <td><?php echo e(Str::limit($internship->description, 50)); ?></td>
                                <td><?php echo e($internship->location); ?></td>
                                <td><?php echo e($internship->start_date); ?> - <?php echo e($internship->end_date); ?></td>
                                <td>
                                    <a href="<?php echo e(route('internships.show', $internship->id)); ?>" class="btn btn-info btn-sm">Detail</a>

                                    <?php if(auth()->check() && auth()->user()->role === 'admin'): ?>
                                        <a href="<?php echo e(route('internships.edit', $internship->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="<?php echo e(route('internships.destroy', $internship->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/index.blade.php ENDPATH**/ ?>