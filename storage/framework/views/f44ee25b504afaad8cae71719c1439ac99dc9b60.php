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
                                <h3 class="card-title"><?php echo app('translator')->get('english.EDIT_USER'); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <?php echo e(Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal', 'id' => 'userId'])); ?>


                            <div class="card-body">

                                <div class="form-group">
                                    <label for="userGroupId"><?php echo app('translator')->get('english.SELECT_GROUP'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::select('group_id', $groupList, Request::get('group_id'), ['class' => 'form-control select2', 'id' => 'userGroupId'])); ?>

                                    <span class="help-block text-danger"><?php echo e($errors->first('group_id')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="userDesignationId"><?php echo app('translator')->get('english.SELECT_DESIGNATION'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::select('designation_id', $designationList, Request::get('designation_id'), ['class' => 'form-control select2', 'id' => 'userDesignationId'])); ?>

                                    <span class="help-block text-danger"><?php echo e($errors->first('designation_id')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="userDepartmentId"><?php echo app('translator')->get('english.SELECT_DEPARTMENT'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::select('department_id', $departmentList, Request::get('department_id'), ['class' => 'form-control select2', 'id' => 'userDepartmentId'])); ?>

                                    <span class="help-block text-danger"><?php echo e($errors->first('department_id')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="UserFirstName"><?php echo app('translator')->get('english.FIRST_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('first_name', Request::get('first_name'), ['id' => 'UserFirstName', 'class' => 'form-control', 'placeholder' => 'Enter First Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('first_name')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="UserLastName"><?php echo app('translator')->get('english.LAST_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('last_name', Request::get('last_name'), ['id' => 'UserLastName', 'class' => 'form-control', 'placeholder' => 'Enter Last Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('last_name')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="userOfficialName"><?php echo app('translator')->get('english.OFFICIAL_NAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('official_name', Request::get('official_name'), ['id' => 'userOfficialName', 'class' => 'form-control', 'placeholder' => 'Enter Official Name'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('official_name')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="userOfficialName"><?php echo app('translator')->get('english.USERNAME'); ?><span class="text-danger"> *</span></label>
                                    <?php echo e(Form::text('username', Request::get('username'), ['id' => 'username', 'placeholder' => 'Enter Username', 'class' => 'form-control'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('username')); ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="UserPassword"><?php echo app('translator')->get('english.PASSWORD'); ?></label>
                                    <?php echo e(Form::password('password', ['id' => 'UserPassword', 'class' => 'form-control', 'placeholder' => 'Password'])); ?>

                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <span class="help-block"><?php echo e(trans('english.COMPLEX_PASSWORD_INSTRUCTION')); ?></span>
                                    <span class="help-block text-danger"> <?php echo e($errors->first('password')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="UserPassword"><?php echo app('translator')->get('english.CONFIRM_PASSWORD'); ?></label>
                                    <?php echo e(Form::password('password_confirmation', ['id' => 'UserConfirmPassword', 'class' => 'form-control', 'placeholder' => 'Confirm Password'])); ?>

                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <span class="help-block text-danger">
                                        <?php echo e($errors->first('password_confirmation')); ?></span>

                                </div>

                                <div class="form-group">
                                    <label for="UserEmail"><?php echo app('translator')->get('english.EMAIL'); ?><span class="text-danger"> *</span></label>

                                    <?php echo e(Form::email('email', Request::get('email'), ['id' => 'UserEmail', 'placeholder' => 'Email Address', 'class' => 'form-control'])); ?>


                                    <span class="help-block text-danger"> <?php echo e($errors->first('email')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userPhoneNumber"><?php echo app('translator')->get('english.PHONE_NUMBER'); ?></label>
                                    <?php echo e(Form::text('phone_no', Request::get('phone_no'), ['id' => 'userPhoneNumber', 'class' => 'form-control', 'placeholder' => 'Enter Phone Number'])); ?>

                                    <span class="help-block text-danger"> <?php echo e($errors->first('phone_no')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="userStatus"><?php echo app('translator')->get('english.STATUS'); ?></label>
                                    <?php echo e(Form::select('status', $status, Request::get('status'), ['class' => 'form-control select2', 'id' => 'userStatus'])); ?>

                                    <span class="help-block text-danger"><?php echo e($errors->first('status')); ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="photo"><?php echo app('translator')->get('english.PHOTO'); ?></label><br>
                                    <?php if(!empty($user->photo)): ?>
                                        <img width="100" height="100" src="<?php echo e(URL::to('/')); ?>/public/uploads/user/<?php echo e($user->photo); ?>"
                                            alt="<?php echo e($user->official_name); ?>">
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
                                <a href="<?php echo e(URL::to('/admin/users')); ?>" class="btn btn-default"><?php echo app('translator')->get('english.CANCEL'); ?></a>
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\SyncriseShop\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>