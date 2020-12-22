<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="title icon" type="image/png" href="{{asset('images/icon.png')}}"/>
        <title>دونگي</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel='stylesheet'>

        <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/welcome/main.css')}}">
    </head>
    <body>
    <!-- header -->
    @auth
        <?php redirect('user')?>
    @endauth
    <header style="background:linear-gradient(rgba(0,0,0,.4),rgba(0,0,0,.5)),url({{asset('images/bg.jpg')}}) no-repeat center center /cover;">
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
                        <a href="#" class="nav-link m-2 menu-item {{'/'==request()->path()?'nav-active':''}}">خانه</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('login')}}" class="nav-link m-2 menu-item">ورود</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('register')}}" class="nav-link m-2 menu-item">ثبت نام</a>
                    </li>
                    <li class="navbar-item">
                        <a href="{{route('about')}}" class="nav-link m-2 menu-item">درباره ما</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- end of navbar -->
        <!-- banner -->
        <div class="text-md-right text-center banner">
            <h1 class="display-4 banner-heading">
                <span class="text-uppercase " style="color:  rgba(214,82,7,0.9);">دونگی</span>
            </h1>
            <p class="lead banner-par font-weight-bold " style="color:  rgb(30,120,255);text-shadow:2px 2px rgba(0,6,143,0.94)">
                یه راه ساده ولی جذاب و مدرن برای محاسبه ی  سهم (دُنگ) هرکس  <br>از هزینه های انجام شده است.
            </p>
            <a href="{{route('register')}}" class="btn btn-lg banner-par btn-success text-uppercase px-3">ثبت نام</a>
        </div>
        <!-- end of banner -->
    </header>
    <!-- end of header -->
    </header>
    <!--



        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{ __('Login') }}</a>
                    @else
                        <a href="{{ route('login') }}">ورود</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">ثبت نام</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel 7
                </div>

            </div>
        </div>
!-->

    </body>
    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
