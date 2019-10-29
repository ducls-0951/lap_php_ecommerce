<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __('admin.admin') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" href="{{ asset('bower_components/admin-template/assets/images/logo/apple-touch-icon.html') }}">
        <link rel="shortcut icon" href="{{ asset('bower_components/admin-template/assets/images/logo/favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/admin-template/assets/vendor/bootstrap/dist/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('bower_components/admin-template/assets/vendor/PACE/themes/blue/pace-theme-minimal.css') }}" />
        <link rel="stylesheet" href="{{ asset('bower_components/admin-template/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('bower_components/admin-template/assets/vendor/datatables/media/css/dataTables.bootstrap4.min.css') }}" />
        <link href="{{ asset('bower_components/admin-template/assets/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/admin-template/assets/css/themify-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/admin-template/assets/css/materialdesignicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/admin-template/assets/css/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bower_components/admin-template/assets/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
    </head>
    <body>
        <div class="app header-default">
            <div class="layout">
                @include('admin.layouts.header')
                @yield('content')
                @include('admin.layouts.side_nav')
            </div>
        </div>
        <script src="{{ asset('bower_components/admin-template/assets/js/vendor.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/js/app.min.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/vendor/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/js/dashboard/default.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/vendor/datatables/media/js/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('bower_components/admin-template/assets/js/tables/data-table.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/template-fesha/vendor/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>
