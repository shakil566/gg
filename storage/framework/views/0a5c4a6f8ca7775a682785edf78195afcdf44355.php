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
                                <h3 class="card-title"><?php echo app('translator')->get('english.CREATE_NEW_DEPARTMENT'); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo e(Form::open(['role' => 'form', 'url' => 'admin/department', 'class' => 'form-horizontal', 'id' => 'createDepartment'])); ?>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name"><?php echo app('translator')->get('english.NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('name', Request::get('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter Department Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('name')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="order"><?php echo app('translator')->get('english.ORDER'); ?></label>
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
                                <a href="<?php echo e(URL::to('/admin/department')); ?>" class="btn btn-default"><i class="fas fa-times"></i> <?php echo app('translator')->get('english.CANCEL'); ?></a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> <?php echo app('translator')->get('english.SUBMIT'); ?></button>
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


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/admin/department/create.blade.php ENDPATH**/ ?>