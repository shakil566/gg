
<?php $__env->startSection('frontend_content'); ?>
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">404 Error</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Error 404 Area Start -->
<div class="error404-area pt-30 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="error-wrapper text-center ptb-50 pt-xs-20">
                    <div class="error-text">
                        <h1>404</h1>
                        <h2>Opps! PAGE NOT BE FOUND</h2>
                        <p>Sorry but the page you are looking for does not exist, have been removed, <br> name changed
                            or is temporarity unavailable.</p>
                    </div>
                    <div class="search-error">
                        <form id="search-form" action="#">
                            <input type="text" placeholder="Search">
                            <button><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </div>
                    <div class="error-button">
                        <a href="<?php echo e(url('/')); ?>">Back to home page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Error 404 Area End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp_8\htdocs\test\resources\views/errors/404.blade.php ENDPATH**/ ?>