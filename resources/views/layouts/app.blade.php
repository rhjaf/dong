<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="title icon" type="image/png" href="{{asset('images/icon.png')}}"/>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/welcome/main.css')}}">
    <style>
        html{
            height: 100%;
        }
    </style>
</head>
<body dir="rtl" style="margin:0;font-family: 'B Nazanin', 'Tahoma';font-size: 18px;background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .9)) no-repeat fixed" >
    <div id="app">
        <!-- navbar -->
        <nav class="navbar navbar-expand-sm fixed-top nav-menu">
            <a href="#" class="navbar-brand text-light text-uppercase" ><span class="h2 font-weight-bold">دونگی</span> <img class="figure-img mr-3" width="50" src="{{asset('images/icon.png')}}"></a>
            <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bg-light line1"></div>
                <div class="bg-light line2"></div>
                <div class="bg-light line3"></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold " id="myNavbar">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="#" class="nav-link m-2 menu-item nav-active">خانه</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('login')}}" class="nav-link m-2 menu-item">ورود</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('register')}}" class="nav-link m-2 menu-item">ثبت نام</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#" class="nav-link m-2 menu-item">درباره ما</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- end of navbar -->

        <main class="py-4 " style="margin-top: 100px">
            @yield('content')
        </main>
    </div>
</body>
</html>
