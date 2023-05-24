<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo app('translator')->get('english.SHOP_NAME'); ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/css/style.css">
    
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/css/custom.css">





    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?php echo e(asset('public/backend')); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo e(asset('public/backend')); ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="<?php echo e(asset('public/backend')); ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- SweetAlert2 -->
    
    <link rel="stylesheet"
        href="<?php echo e(asset('public/backend')); ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/dist/css/admin.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/dist/css/admin.css.map">
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/dist/css/admin.min.css.map">

    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('public/backend')); ?>/plugins/summernote/summernote-bs4.min.css">
    <link rel="shortcut icon" type="image/icon" href="<?php echo e(asset('public')); ?>/img/shortcut_icon.png" />
</head>

<body>
    
    <div class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

        <?php if(auth()->guard()->guest()): ?>
        <?php else: ?>
            <div class="wrapper">

                <!-- Preloader -->
                <div class="preloader flex-column justify-content-center align-items-center">
                    <img class="animation__wobble" src="<?php echo e(asset('public/')); ?>/img/pre_loader.png" alt="Pre Loader Logo"
                         height="60" width="60">
                </div>

                <!-- Navbar -->
                <?php echo $__env->make('layouts.admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                <?php echo $__env->make('layouts.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- End Sidebar Container -->
            <?php endif; ?>
            <!-- Content Wrapper. Contains page content -->
            <?php echo $__env->yieldContent('admin_content'); ?>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php echo $__env->make('layouts.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Admin App -->
    <script src="<?php echo e(asset('public/backend')); ?>/dist/js/admin.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/chart.js/Chart.min.js"></script>

    <!-- Admin for demo purposes -->
    <script src="<?php echo e(asset('public/backend')); ?>/dist/js/demo.js"></script>
    <!-- Admin dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo e(asset('public/backend')); ?>/dist/js/pages/dashboard2.js"></script>

    <!-- Select2 -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/select2/js/select2.full.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


    <!-- SweetAlert2 -->
    
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/toastr/toastr.min.js"></script>

    <!-- Summernote -->
    <script src="<?php echo e(asset('public/backend')); ?>/plugins/summernote/summernote-bs4.min.js"></script>


    <script type="text/javascript">
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

        });

        // main menu toggle of sub-menu
        $(".menu-item-has-children > a").click(function(e) {
            // check active
            var isCurrentActive = $(this).next('.sub-menu').hasClass('visible')

            // remove .visible from other .sub-menu
            $(".sub-menu").removeClass('visible');

            // if current menu deactive add visible
            if (!isCurrentActive) {
                $(this).next(".sub-menu").addClass('visible');
            }

            // prevent the <a> from default behavior
            e.preventDefault();
        });


        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["pdf", "print"]
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });


        $(document).on("submit", '#delete', function(e) {
            //This function use for sweetalert confirm message
            e.preventDefault();
            var form = this;
            Swal.fire({
                title: 'Do you want to Delete?',
                showDenyButton: true,
                icon: "warning",
                // showCancelButton: true,
                confirmButtonText: `DELETE`,
                denyButtonText: `Don't DELETE`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Swal.fire('Deleted!', '', 'success')
                    form.submit();
                } else if (result.isDenied) {
                    // Swal.fire('Not Deleted!', '', 'info')
                }
            })
        });



        $(document).on("click", "#logout", function(e) {

            // before  logout showing alert message
            //This function use for sweetalert confirm message
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you Want to logout?',
                showDenyButton: true,
                // showCancelButton: true,
                icon: "warning",
                confirmButtonText: `Logout`,
                denyButtonText: `Don't Logout!`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    // Swal.fire('Deleted!', '', 'success')
                    window.location.href = link;
                } else if (result.isDenied) {
                    // Swal.fire('Not Logout!', '', 'info')
                }
            })
        });


        <?php if(Session::has('messege')): ?>
            var type = "<?php echo e(Session::get('alert-type', 'info')); ?>"
            switch (type) {
                case 'info':
                    toastr.info("<?php echo e(Session::get('messege')); ?>");
                    break;
                case 'success':
                    toastr.success("<?php echo e(Session::get('messege')); ?>");
                    break;
                case 'warning':
                    toastr.warning("<?php echo e(Session::get('messege')); ?>");
                    break;
                case 'error':
                    toastr.error("<?php echo e(Session::get('messege')); ?>");
                    break;
            }
        <?php endif; ?>


        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
    </script>

</body>

</html>
<?php /**PATH F:\xampp\htdocs\LaravelProjectDemoAdminLte\resources\views/layouts/admin/master.blade.php ENDPATH**/ ?>