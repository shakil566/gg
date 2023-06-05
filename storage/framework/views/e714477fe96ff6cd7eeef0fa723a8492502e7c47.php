<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo app('translator')->get('english.SHOP_NAME'); ?></title>
    <meta name="description" content="">
    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(asset('public/frontend/css/custom.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/frontend/css/bootstrap5.css')); ?>" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?php echo e(asset('public/')); ?>/img/logo.png" />
    <!-- Material Design Iconic Font-V2.2.0 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/material-design-iconic-font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/font-awesome.min.css">
    <!-- Font Awesome Stars-->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/fontawesome-stars.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/meanmenu.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/owl.carousel.min.css">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/slick.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/animate.css">
    <!-- Jquery-ui CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/jquery-ui.min.css">
    <!-- Venobox CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/venobox.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/nice-select.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/magnific-popup.css">
    <!-- Bootstrap V4.1.3 Fremwork CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/bootstrap.min.css">
    <!-- Helper CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/helper.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend')); ?>/css/responsive.css">
    <!-- Modernizr js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">

        <?php echo $__env->make('layouts.frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('frontend_content'); ?>
        <?php echo $__env->make('layouts.frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
    <!-- Body Wrapper End Here -->

    <!--   JS Files   -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery-V1.12.4 -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/vendor/popper.min.js"></script>
    <!-- Bootstrap V4.1.3 Fremwork js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/bootstrap.min.js"></script>
    <!-- Ajax Mail js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/ajax-mail.js"></script>
    <!-- Meanmenu js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.meanmenu.min.js"></script>
    <!-- Wow.min js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/wow.min.js"></script>
    <!-- Slick Carousel js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/slick.min.js"></script>
    <!-- Owl Carousel-2 js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/owl.carousel.min.js"></script>
    <!-- Magnific popup js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/isotope.pkgd.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mixitup js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.mixitup.min.js"></script>
    <!-- Countdown -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.countdown.min.js"></script>
    <!-- Counterup -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/waypoints.min.js"></script>
    <!-- Barrating -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.barrating.min.js"></script>
    <!-- Jquery-ui -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery-ui.min.js"></script>
    <!-- Venobox -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/venobox.min.js"></script>
    <!-- Nice Select js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/jquery.nice-select.min.js"></script>
    <!-- ScrollUp js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/scrollUp.min.js"></script>
    <!-- Main/Activator js -->
    <script src="<?php echo e(asset('public/frontend')); ?>/js/main.js"></script>

</body>

</html>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/frontend/master.blade.php ENDPATH**/ ?>