
<?php $__env->startSection('title'); ?>
    <?php echo $__env->yieldContent('Welcome to Demo Shop'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.frontend.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="contact-list margin-top-10 margin-bottom-10">

        
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/frontend/index.blade.php ENDPATH**/ ?>