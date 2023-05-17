<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        

        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        
        <li class="nav-item dropdown">

            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="<?php echo e(asset('public')); ?>/img/unknown.png" class="img-circle user-icon" alt="User Image">
                <span class="nav-username"><?php echo e(Auth::user()->first_name .' '. Auth::user()->last_name); ?> <i
                        class="fas fa-angle-down"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">

                <a href="#" class="dropdown-item">
                    <i class="fa fa-user"></i> <?php echo app('translator')->get('english.PROFILE'); ?>
                </a>

                <div class="dropdown-divider"></div>
                <a class=" dropdown-item" href="<?php echo e(route('logout.perform')); ?>">
                    <i class="fas fa-sign-out-alt"></i> <?php echo app('translator')->get('english.LOGOUT'); ?>
                </a>
                

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('logout.perform')); ?>" title="<?php echo e(__('english.LOGOUT')); ?>">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            
        </li>
    </ul>
</nav>
<?php /**PATH E:\xampp_8\htdocs\test\resources\views/layouts/admin/navbar.blade.php ENDPATH**/ ?>