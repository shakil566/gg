
<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('Welcome to Demo Shop'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="home-main">
        <a href="<?php echo e(URL::to('/admin')); ?>" class="admin-btn"><?php echo app('translator')->get('english.GO_TO_ADMIN_PANEL'); ?>
            <i class="fa fa-arrow-right admin-icon"></i></a>

        
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/frontend/index.blade.php ENDPATH**/ ?>