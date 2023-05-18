<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('english.SHOP_NAME')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/css/style.css">
    {{-- Custom style --}}
    <link rel="stylesheet" href="{{ asset('public/backend') }}/css/custom.css">





    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.css.map">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.min.css.map">


    <link rel="shortcut icon" type="image/icon" href="{{ asset('public') }}/img/shortcut_icon.png" />
</head>

<body>
    {{-- for dark mode --- add a class (dark-mode) --}}
    <div class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

        @guest
        @else
            <div class="wrapper">

                <!-- Preloader -->
                <div class="preloader flex-column justify-content-center align-items-center">
                    <img class="animation__wobble" src="{{ asset('public/') }}/img/pre_loader.png"
                        alt="Pre Loader Logo"
                        {{-- height="220" width="380" --}}
                        height="60" width="60"
                        >
                </div>

                <!-- Navbar -->
                @include('layouts.admin.navbar')
                <!-- /.navbar -->

                <!-- Main Sidebar Container -->
                @include('layouts.admin.sidebar')
                <!-- End Sidebar Container -->
            @endguest
            <!-- Content Wrapper. Contains page content -->
            @yield('admin_content')
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            @include('layouts.admin.footer')

        </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('public/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/backend') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- Admin App -->
    <script src="{{ asset('public/backend') }}/dist/js/admin.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('public/backend') }}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{ asset('public/backend') }}/plugins/chart.js/Chart.min.js"></script>

    <!-- Admin for demo purposes -->
    <script src="{{ asset('public/backend') }}/dist/js/demo.js"></script>
    <!-- Admin dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('public/backend') }}/dist/js/pages/dashboard2.js"></script>

    <!-- Select2 -->
        <script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

            });
        </script>
        <script>
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
        </script>

        <!-- DataTables  & Plugins -->
        <script src="{{ asset('public/backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/jszip/jszip.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Toastr -->
        <script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>
</body>

</html>
