

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Program Magang</h1>
    <form action="<?php echo e(route('internships.update', $internship->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="name">Nama Program</label>
            <input type="text" name="name" class="form-control" value="<?php echo e($internship->name); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" required><?php echo e($internship->description); ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dashboard-magang\resources\views/internships/edit.blade.php ENDPATH**/ ?>