<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="bower_components/template-fesha/images/icons/favicon.png"/>
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/fonts/themify/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/fonts/elegant-font/html-css/style.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/vendor/lightbox2/css/lightbox.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/css/util.css">
    <link rel="stylesheet" type="text/css" href="bower_components/template-fesha/css/main.css">

    <title>{{ __('header.title') }}</title>
</head>
    <body class="animsition">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <script type="text/javascript" src="bower_components/template-fesha/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/animsition/js/animsition.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/bootstrap/js/popper.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/slick/slick.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/js/slick-custom.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/countdowntime/countdowntime.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/lightbox2/js/lightbox.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/sweetalert/sweetalert.min.js"></script>
        <script type="text/javascript" src="bower_components/template-fesha/vendor/parallax100/parallax100.js"></script>
        <script src="bower_components/template-fesha/js/main.js"></script>
        <script src="js/template.js"></script>
    </body>
</html>
