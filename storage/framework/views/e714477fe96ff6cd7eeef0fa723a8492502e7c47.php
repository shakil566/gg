<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo app('translator')->get('english.SHOP_NAME'); ?></title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

    <link href="<?php echo e(asset('public/frontend/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/bootstrap5.css')); ?>" rel="stylesheet">

    <link rel="shortcut icon" type="image/icon" href="<?php echo e(asset('public/img')); ?>/shortcut_icon.png" />

    
</head>

<body class="home">

    <?php echo $__env->make('layouts.frontend.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>


    <!--   JS Files   -->
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.bundle.min.js')); ?>"></script>

</body>

</html>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/frontend/master.blade.php ENDPATH**/ ?>