<?php $__env->startSection('content'); ?>
<div class="container py-5" style="background: #f8fafc; min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Task Manager Dashboard</h2>
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-outline-secondary">Logout</button>
        </form>
    </div>
    <div class="row mb-4">
        <div class="col-md-8 mx-auto">
            <form method="GET" action="<?php echo e(route('dashboard')); ?>" class="input-group shadow-sm">
                <input type="text" name="search" value="<?php echo e($query ?? ''); ?>" placeholder="Search tasks..." class="form-control" />
                <button type="submit" class="btn btn-primary">🔍 Search</button>
            </form>
        </div>
        <div class="col-md-4 text-end mt-3 mt-md-0">
            <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-success shadow-sm">➕ Add Task</a>
        </div>
    </div>
    <div class="row g-4">
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white d-flex align-items-center justify-content-between">
                        <span class="fw-semibold"><?php echo e($status); ?></span>
                        <span class="badge bg-<?php echo e($status === 'To Do' ? 'secondary' : ($status === 'In Progress' ? 'info' : 'success')); ?>"><?php echo e($group->count()); ?></span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php $__empty_1 = true; $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="text-truncate" style="max-width: 120px;">📝 <?php echo e($task->title); ?></span>
                                <div class="d-flex align-items-center gap-1">
                                    <?php if($status !== 'Done'): ?>
                                        <form action="<?php echo e(route('tasks.update', $task)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="status" value="<?php echo e($status === 'To Do' ? 'In Progress' : 'Done'); ?>">
                                            <button class="btn btn-sm btn-outline-primary" title="Mark as <?php echo e($status === 'To Do' ? 'In Progress' : 'Done'); ?>">
                                                <?php echo e($status === 'To Do' ? '➡️' : '✅'); ?>

                                            </button>
                                        </form>
                                    <?php endif; ?>
                                    <form action="<?php echo e(route('tasks.destroy', $task)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <li class="list-group-item text-muted">No tasks</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div id="vue-app" class="mt-5"></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\patel\OneDrive\Desktop\Programming\PHP\Task_Manager\resources\views/dashboard.blade.php ENDPATH**/ ?>