<?php $__env->startSection('admin_content'); ?>
    <!-- BEGIN CONTENT BODY -->
    <div class="content-wrapper">

        <!-- BEGIN PORTLET-->
        <?php echo $__env->make('layouts.admin.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END PORTLET-->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 margin-top-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo app('translator')->get('english.CREATE_NEW_DESIGNATION'); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo e(Form::open(['role' => 'form', 'url' => 'admin/designation', 'class' => 'form-horizontal', 'id' => 'createDesignation'])); ?>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="desigName"><?php echo app('translator')->get('english.TITLE'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('title', Request::get('title'), ['id' => 'desigName', 'class' => 'form-control', 'placeholder' => 'Enter Designation Title'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('title')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="order"><?php echo app('translator')->get('english.STATUS'); ?></label>
                                    <?php echo Form::select('order', $orderList, $lastOrderNumber, [
                                        'class' => 'form-control select2',
                                        'id' => 'order',
                                    ]); ?>


                                    <span class="help-block text-danger"> <?php echo e($errors->first('order')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="statusId"><?php echo app('translator')->get('english.STATUS'); ?></label>
                                    <?php echo Form::select('status', ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')], '1', [
                                        'class' => 'form-control select2',
                                        'id' => 'statusId',
                                    ]); ?>

                                    <span class="help-block text-danger"><?php echo e($errors->first('status')); ?></span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('english.SUBMIT'); ?></button>
                                <a href="<?php echo e(URL::to('/admin/designation')); ?>" class="btn btn-default"><?php echo app('translator')->get('english.CANCEL'); ?></a>
                            </div>
                            <?php echo e(Form::close()); ?>

                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.row -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END CONTENT BODY -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\SyncriseShop\resources\views/admin/designation/create.blade.php ENDPATH**/ ?>