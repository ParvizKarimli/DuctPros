<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Browser Bar Icon -->
    <link rel="shortcut icon" href="assets/images/icons/favicon.png" />

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Title -->
    <title>DuctPros | @yield('title_specific')</title>

    <!-- START CSS -->
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Magnific popup CSS -->
    <link href="assets/css/magnific/magnific-popup.css" rel="stylesheet">

    <!-- Font awesome CSS -->
    <link href="assets/font/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Theme responsive CSS -->
    <link href="assets/css/theme-responsive.css" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">

    <!-- Owl carousel CSS -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.transitions.css" rel="stylesheet">

    <!-- Slick carousel CSS -->
    <link href="assets/css/slick.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,600,700,800,900" rel="stylesheet">
    <!-- END CSS -->

</head>

<body id="body-top">

@include('inc.loader')
@include('inc.top_header')
@include('inc.header')

@yield('content')

@include('inc.footer')
@include('inc.sub_footer')
@include('inc.to_top_btn')
@include('inc.scripts')
@include('inc.tawk')

</body>
</html>
