<?php $__env->startSection('content'); ?>
<div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh; background: #f8fafc;">
    <div class="card shadow p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="mb-4 text-center fw-bold">Login to Task Manager</h3>
        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger py-2">
                    <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Don't have an account? <a href="<?php echo e(route('register')); ?>">Register</a></p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\patel\OneDrive\Desktop\Programming\PHP\Task_Manager\resources\views/auth/login.blade.php ENDPATH**/ ?>