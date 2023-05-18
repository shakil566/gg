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
                                <h3 class="card-title"><?php echo app('translator')->get('english.UPDATE_USER_PROFILE'); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo e(Form::open(array('role' => 'form', 'url' => 'admin/users/editProfile', 'files'=> true, 'class' => 'form-horizontal', 'id' => 'edit-profile'))); ?>


                            <div class="card-body">


                                <div class="form-group">
                                    <label for="UserFirstName"><?php echo app('translator')->get('english.FIRST_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('first_name', Auth::user()->first_name, ['id' => 'UserFirstName', 'class' => 'form-control', 'placeholder' => 'Enter First Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('first_name')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="UserLastName"><?php echo app('translator')->get('english.LAST_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('last_name', Auth::user()->last_name, ['id' => 'UserLastName', 'class' => 'form-control', 'placeholder' => 'Enter Last Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('last_name')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="userOfficialName"><?php echo app('translator')->get('english.OFFICIAL_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('official_name', Auth::user()->official_name, ['id' => 'userOfficialName', 'class' => 'form-control', 'placeholder' => 'Enter Official Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('official_name')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userPhoneNumber"><?php echo app('translator')->get('english.PHONE_NUMBER'); ?></label>
                                    <?php echo e(Form::text('phone_no', Auth::user()->phone_no, ['id' => 'userPhoneNumber', 'class' => 'form-control', 'placeholder' => 'Enter Phone Number'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('phone_no')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="photo"><?php echo app('translator')->get('english.PHOTO'); ?></label><br>
                                    <?php if(!empty(Auth::user()->photo)): ?>
                                        <img width="100" height="100" src="<?php echo e(URL::to('/')); ?>/public/uploads/user/<?php echo e(Auth::user()->photo); ?>"
                                            alt="<?php echo e(Auth::user()->official_name); ?>">
                                    <?php else: ?>
                                        <img width="100" height="100" src="<?php echo e(URL::to('/')); ?>/public/img/no_image.png" alt="">
                                    <?php endif; ?>
                                    <?php echo e(Form::file('photo', Request::get('photo'), ['class' => 'form-control', 'id' => 'photo', 'files' => 'true'])); ?>


                                    <span class="help-block text-danger"><?php echo e($errors->first('photo')); ?></span>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger"><?php echo e(trans('english.NOTE')); ?></span>
                                        <?php echo e(trans('english.USER_AND_STUDENT_IMAGE_FOR_IMAGE_DESCRIPTION')); ?>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('english.SUBMIT'); ?></button>
                                <a href="<?php echo e(URL::to('/dashboard/admin')); ?>" class="btn btn-default"><?php echo app('translator')->get('english.CANCEL'); ?></a>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\SyncriseShop\resources\views/admin/users/user_profile.blade.php ENDPATH**/ ?>