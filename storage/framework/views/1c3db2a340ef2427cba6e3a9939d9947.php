<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Add Task</h2>
    <form method="POST" action="<?php echo e(route('tasks.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\patel\OneDrive\Desktop\Programming\PHP\Task_Manager\resources\views/tasks/create.blade.php ENDPATH**/ ?>