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

    {{--  font aweasome  --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
</head>
<body dir="rtl" style="margin:0;font-family: 'B Nazanin', 'Tahoma';font-size: 18px;background: linear-gradient(rgba(0, 0, 0, .7), rgba(0, 0, 0, .9)) no-repeat fixed" >
    <div id="app">
        <!-- navbar -->
        <nav class="navbar navbar-expand-sm fixed-top nav-menu" style="font-family: 'B Morvarid'">
            <a href="#" class="navbar-brand text-light text-uppercase" ><span class="h2 font-weight-bold">دونگی</span> <img class="figure-img mr-3" width="50" src="{{asset('images/icon.png')}}"></a>
            <button class="navbar-toggler nav-button" type="button" data-toggle="collapse" data-target="#myNavbar">
                <div class="bg-light line1"></div>
                <div class="bg-light line2"></div>
                <div class="bg-light line3"></div>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase font-weight-bold " id="myNavbar">
                <ul class="navbar-nav">
                    <li class="navbar-item">
                        <a href="{{route('welcome')}}" class="nav-link m-2 menu-item {{'/'==request()->path()?'nav-active':''}}">خانه</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('login')}}" class="nav-link m-2 menu-item {{'login'==request()->path()?'nav-active':''}}">ورود</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('register')}}" class="nav-link m-2 menu-item {{'register'==request()->path()?'nav-active':''}}">ثبت نام</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('about')}}" class="nav-link m-2 menu-item {{'about'==request()->path()?'nav-active':''}}">درباره ما</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- end of navbar -->

        <main class="py-4 " style="margin-top: 100px">
            @yield('content')
        </main>
    </div>

    <footer class="bg-dark px-5 " style="display: {{'about'==request()->path()?'block':'none'}}">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center text-light border-top pt-3">
                    &copy; Copyright 2020 Made With
                    <i class="fab fa-laravel text-danger"></i>
                    by <a class="text-success" href="https://rhjaf.github.io">RHJAR</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
