<?php $__env->startSection('admin_content'); ?>
    <!-- BEGIN CONTENT BODY -->
    <div class="content-wrapper">

        <!-- BEGIN PORTLET-->
        <?php echo $__env->make('layouts.admin.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- END PORTLET-->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?php echo app('translator')->get('english.UNIT'); ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard/admin')); ?>"><?php echo app('translator')->get('english.DASHBOARD'); ?></a></li>
                            <li class="breadcrumb-item active"><?php echo app('translator')->get('english.UNIT'); ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo app('translator')->get('english.UNIT_DETAILS'); ?></h3>
                                <a href="<?php echo e(url('admin/unit/create')); ?>"
                                    class="btn btn-sm btn-info float-right"><?php echo app('translator')->get('english.CREATE_NEW'); ?></a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th><?php echo app('translator')->get('english.SL_NO'); ?></th>
                                            <th><?php echo app('translator')->get('english.TITLE'); ?></th>
                                            <th><?php echo app('translator')->get('english.INFO'); ?></th>
                                            <th><?php echo app('translator')->get('english.ORDER'); ?></th>
                                            <th><?php echo app('translator')->get('english.STATUS'); ?></th>
                                            <th><?php echo app('translator')->get('english.ACTION'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if(!empty($unitArr)): ?>
                                            <?php
                                            $sl = 0;
                                            ?>
                                            <?php $__currentLoopData = $unitArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr class="text-center">
                                                    <td><?php echo e(++$sl); ?></td>
                                                    <td><?php echo e($value->title ?? ''); ?>

                                                    <td><?php echo e($value->info ?? ''); ?>

                                                    </td> 
                                                    <td><?php echo e($value->order ?? ''); ?></td>
                                                    <td>
                                                        <?php if($value->status == '1'): ?>
                                                            <span class="badge badge-success"><?php echo app('translator')->get('english.ACTIVE'); ?></span>
                                                        <?php else: ?>
                                                            <span class="badge badge-danger"><?php echo app('translator')->get('english.INACTIVE'); ?></span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo e(Form::open(['url' => 'admin/unit/' . $value->id, 'id' => 'delete'])); ?>

                                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                                        <a class='btn btn-primary btn-xs'
                                                            href="<?php echo e(URL::to('admin/unit/' . $value->id . '/edit')); ?>"
                                                            title="<?php echo e(trans('english.EDIT')); ?>">
                                                            <i class='fa fa-edit'></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            title="<?php echo e(trans('english.DELETE')); ?>" data-placement="top"
                                                            data-rel="tooltip" data-original-title="Delete">
                                                            <i class='fa fa-trash'></i>
                                                        </button>
                                                        <?php echo e(Form::close()); ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="15"><?php echo e(__('english.EMPTY_DATA')); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- END CONTENT BODY -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/admin/unit/index.blade.php ENDPATH**/ ?>