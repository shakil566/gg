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
                    <h1><?php echo app('translator')->get('english.USER'); ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard/admin')); ?>"><?php echo app('translator')->get('english.DASHBOARD'); ?></a></li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('english.USER'); ?></li>
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
                            <h3 class="card-title"><?php echo app('translator')->get('english.USER_DETAILS'); ?></h3>
                            <a href="<?php echo e(url('admin/users/create')); ?>" class="btn btn-sm btn-info float-right"><?php echo app('translator')->get('english.CREATE_NEW'); ?></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th><?php echo app('translator')->get('english.SL_NO'); ?></th>
                                        
                                        <th class="username"><?php echo app('translator')->get('english.USERNAME'); ?></th>
                                        <th><?php echo app('translator')->get('english.EMAIL'); ?></th>
                                        <th><?php echo app('translator')->get('english.NAME'); ?></th>
                                        <th><?php echo app('translator')->get('english.PHOTO'); ?></th>
                                        <th><?php echo app('translator')->get('english.STATUS'); ?></th>
                                        <th><?php echo app('translator')->get('english.ACTION'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($usersArr)): ?>
                                    <?php
                                    $sl = 0;
                                    ?>
                                    <?php $__currentLoopData = $usersArr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <td><?php echo e(++$sl); ?></td>
                                        
                                        <td><?php echo e($value->username); ?></td>
                                        <td><?php echo e($value->email); ?></td>
                                        <td><?php echo e($value->first_name); ?> <?php echo e($value->last_name); ?></td>
                                        <td class="text-center">
                                            <?php if(isset($value->photo)): ?>
                                            <img width="100" height="100" src="<?php echo e(URL::to('/')); ?>/public/uploads/user/<?php echo e($value->photo); ?>" alt="<?php echo e($value->first_name.' '.$value->last_name); ?>">
                                            <?php else: ?>
                                            <img width="100" height="100" src="<?php echo e(URL::to('/')); ?>/public/img/unknown.png" alt="<?php echo e($value->first_name.' '.$value->last_name); ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($value->status == 'active'): ?>
                                                <span class="badge badge-success"><?php echo app('translator')->get('english.ACTIVE'); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-danger"><?php echo app('translator')->get('english.INACTIVE'); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <?php echo e(Form::open(array('url' => 'admin/users/' . $value->id, 'id' => 'delete'))); ?>

                                            <?php echo e(Form::hidden('_method', 'DELETE')); ?>


                                            <?php
                                            $dd = Request::query();
                                            if (!empty($dd)) {
                                                $param = '';
                                                $sn = 1;

                                                foreach ($dd as $key => $item) {
                                                    if ($sn === 1) {
                                                        $param .= $key . '=' . $item;
                                                    } else {
                                                        $param .= '&' . $key . '=' . $item;
                                                    }
                                                    $sn++;
                                                } //foreach
                                            }
                                            ?>
                                            <a class='btn btn-info btn-xs tooltips' href="<?php echo e(URL::to('admin/users/activate/' . $value->id )); ?><?php if(isset($param)): ?><?php echo e('/'.$param); ?> <?php endif; ?>" data-rel="tooltip" title="<?php if($value->status == 'active'): ?> Inactivate <?php else: ?> Activate <?php endif; ?>" data-container="body" data-trigger="hover" data-placement="top">
                                                <?php if($value->status == 'active'): ?>
                                                <i class='fa fa-times'></i>
                                                <?php else: ?>
                                                <i class='fa fa-check-circle'></i>
                                                <?php endif; ?>
                                            </a>
                                            <a class='btn btn-primary btn-xs tooltips' href="<?php echo e(URL::to('admin/users/' . $value->id . '/edit')); ?>" title="Edit User" data-container="body" data-trigger="hover" data-placement="top">
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            

                                            <button class="btn btn-danger btn-xs tooltips" type="submit" title="Delete" data-placement="top" data-rel="tooltip" data-original-title="Delete">
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

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/admin/users/index.blade.php ENDPATH**/ ?>