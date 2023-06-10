<?php $__env->startSection('admin_content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><?php echo app('translator')->get('english.DASHBOARD'); ?></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo e(Auth::user()->count()); ?></h3>
                                <p><?php echo app('translator')->get('english.USER'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="<?php echo e(URL::to('/admin/users')); ?>" class="small-box-footer"><?php echo app('translator')->get('english.MORE_INFO'); ?> <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e(Auth::user()->department->count()); ?>

                                    
                                </h3>

                                <p><?php echo app('translator')->get('english.DEPARTMENT'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <a href="<?php echo e(URL::to('/admin/department')); ?>" class="small-box-footer"><?php echo app('translator')->get('english.MORE_INFO'); ?> <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo e($productCategoryCount ?? ''); ?></h3>

                                <p><?php echo app('translator')->get('english.PRODUCT_CATEGORY'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <a href="<?php echo e(URL::to('/admin/productCategory')); ?>" class="small-box-footer"><?php echo app('translator')->get('english.MORE_INFO'); ?> <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo e($brandCount ?? ''); ?></h3>

                                <p><?php echo app('translator')->get('english.BRAND'); ?></p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <a href="<?php echo e(URL::to('/admin/brand')); ?>" class="small-box-footer"><?php echo app('translator')->get('english.MORE_INFO'); ?> <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>