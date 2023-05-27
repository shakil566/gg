<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('english.SHOP_NAME')</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->

    <link href="{{ asset('public/frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/bootstrap5.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/icon" href="{{ asset('public/img') }}/shortcut_icon.png" />

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body class="home">

    @include('layouts.frontend.navbar')
    <div class="content">
        @yield('content')
    </div>


    <!--   JS Files   -->
    <script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
