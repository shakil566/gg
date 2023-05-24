
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
                                <h3 class="card-title">Send mail to All User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo e(Form::open(['role' => 'form', 'url' => 'admin/sendMail/send', 'class' => 'form-horizontal', 'id' => 'sendMail'])); ?>


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="subject">Subject<span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('subject', Request::get('subject'), ['id' => 'subject', 'class' => 'form-control', 'placeholder' => 'Enter Main Subject'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('subject')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Body<span class="text-danger"> *</span></label>
                                    <?php echo e(Form::textarea('description', Request::get('description'), ['id' => 'summernote', 'class' => '', 'placeholder' => 'Enter Main Subject'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('description')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userId">USER</label>
                                    <?php echo Form::select('user_id', $userArr, Request::old('user_id'), [
                                        'class' => 'form-control select2',
                                        'id' => 'user_id',
                                    ]); ?>


                                    <span class="help-block text-danger"> <?php echo e($errors->first('user_id')); ?></span>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">SEND</button>
                                <a href="#" class="btn btn-default"><?php echo app('translator')->get('english.CANCEL'); ?></a>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/admin/mailSend/index.blade.php ENDPATH**/ ?>