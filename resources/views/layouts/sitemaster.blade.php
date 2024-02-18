<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title')
    </title>
    <link href="{{ asset('assets/site/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="{{ asset('assets/site/img/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/font-awesome-5all.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.css') }}" />
    <link href="{{ asset('assets/site/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/site/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}" />
</head>

<body>
<div id="preloader">
    <div id="loader"></div>
</div>
@include('partials.header')
<div class="home-page">
    @include('partials.sidebar')
    @yield('content')

    @include('partials.validation')

</div>


<script src=" {{ asset('assets/site/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/site/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/site/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/site/js/scripts.js') }}"></script>

@yield('script')
</body>

</html>
