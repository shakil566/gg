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

    <!-- MultiSelect STYLES -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/css/bootstrap-multiselect.css" type="text/css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{ asset('public/backend') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.css">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.css.map">
    <link rel="stylesheet" href="{{ asset('public/backend') }}/dist/css/admin.min.css.map">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('public/backend') }}/plugins/fullcalendar/main.css">

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
                    <img class="animation__wobble" src="{{ asset('public/') }}/img/pre_loader.png" alt="Pre Loader Logo"
                        {{-- height="220" width="380" --}} height="60" width="60">
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
    <script src="{{ asset('public/backend') }}/dist/js/pages/dashboard.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('public/backend') }}/plugins/select2/js/select2.full.min.js"></script>


    <!-- MultiSelect SCRIPTS -->
    <script type="text/javascript" src="{{ asset('public/backend') }}/js/bootstrap-multiselect.js"></script>


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
    <script src="{{ asset('public/backend') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{ asset('public/backend') }}/plugins/toastr/toastr.min.js"></script>

    <!-- Summernote -->
    <script src="{{ asset('public/backend') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('public/backend') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('public/backend') }}/plugins/fullcalendar/main.js"></script>

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


        @if (Session::has('messege'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
            }
        @endif


        $(function() {
            // Summernote
            $('#summernote').summernote()
        })

        //multi select
        $(document).ready(function() {
            $('#multiselect').multiselect({
                enableFiltering: true,
                includeSelectAllOption: true,
                nonSelectedText: 'Select Options',
                includeFilterClearBtn: true,
                enableCaseInsensitiveFiltering: true,
                allSelectedText: 'No option left ...'
            });
        });


        $(function() {

            /* initialize the external events
             -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {

                    // create an Event Object (https://fullcalendar.io/docs/event-object)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    // $(this).draggable({
                    //     zIndex: 1070,
                    //     revert: true, // will cause the event to go back to its
                    //     revertDuration: 0 //  original position after the drag
                    // })

                })
            }

            ini_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.external-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText,
                        backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        borderColor: window.getComputedStyle(eventEl, null).getPropertyValue(
                            'background-color'),
                        textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                    };
                }
            });

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                //Random default events
                events: [{
                        title: 'All Day Event',
                        start: new Date(y, m, 1),
                        backgroundColor: '#f56954', //red
                        borderColor: '#f56954', //red
                        allDay: true
                    },
                    {
                        title: 'Long Event',
                        start: new Date(y, m, d - 5),
                        end: new Date(y, m, d - 2),
                        backgroundColor: '#f39c12', //yellow
                        borderColor: '#f39c12' //yellow
                    },
                    {
                        title: 'Meeting',
                        start: new Date(y, m, d, 10, 30),
                        allDay: false,
                        backgroundColor: '#0073b7', //Blue
                        borderColor: '#0073b7' //Blue
                    },
                    {
                        title: 'Lunch',
                        start: new Date(y, m, d, 12, 0),
                        end: new Date(y, m, d, 14, 0),
                        allDay: false,
                        backgroundColor: '#00c0ef', //Info (aqua)
                        borderColor: '#00c0ef' //Info (aqua)
                    },
                    {
                        title: 'Birthday Party',
                        start: new Date(y, m, d + 1, 19, 0),
                        end: new Date(y, m, d + 1, 22, 30),
                        allDay: false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor: '#00a65a' //Success (green)
                    },
                    {
                        title: 'Click for Google',
                        start: new Date(y, m, 28),
                        end: new Date(y, m, 29),
                        url: 'https://www.google.com/',
                        backgroundColor: '#3c8dbc', //Primary (light-blue)
                        borderColor: '#3c8dbc' //Primary (light-blue)
                    }
                ],
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar !!!
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                }
            });

            calendar.render();
            // $('#calendar').fullCalendar()

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            // Color chooser button
            $('#color-chooser > li > a').click(function(e) {
                e.preventDefault()
                // Save color
                currColor = $(this).css('color')
                // Add color effect to button
                $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color': currColor
                })
            })
            $('#add-new-event').click(function(e) {
                e.preventDefault()
                // Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                // Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color': currColor,
                    'color': '#fff'
                }).addClass('external-event')
                event.text(val)
                $('#external-events').prepend(event)

                // Add draggable funtionality
                ini_events(event)

                // Remove event from text input
                $('#new-event').val('')
            })
        });
    </script>
</body>

</html>
