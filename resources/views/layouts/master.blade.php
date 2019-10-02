<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bower_components/bootstrap-package/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="bower_components/bootstrap-package/bootstrap-4.3.1-dist/fontawesome-free-5.11.2-web/css/fontawesome.css">
    <link rel="stylesheet" href="bower_components/bootstrap-package/bootstrap-4.3.1-dist/fontawesome-free-5.11.2-web/css/brands.css">
    <link rel="stylesheet" href="bower_components/bootstrap-package/bootstrap-4.3.1-dist/fontawesome-free-5.11.2-web/css/solid.css">
    <title>{{ __('header.title') }}</title>
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <script src="bower_components/bootstrap-package/jquery.min.js"></script>
    <script src="bower_components/bootstrap-package/popper.min.js"></script>
    <script src="bower_components/bootstrap-package/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>
</html>
