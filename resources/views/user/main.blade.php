<!doctype html>
<html lang="fa">
<head>
    {{--  Required meta tags  --}}
    <meta charset="utf-8" data-html="true">
    <meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="title icon" type="image/png" href="{{asset('images/icon.png')}}"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  Fontaweasome  --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    @yield('style')

    <title>پنل کاربری</title>



</head>
<body >
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light flex-column-reverse" >
    <button class="navbar-toggler ml-auto mb-2 bg-light" type="button" data-toggle="collapse" data-target="#myNavBar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="myNavBar">
        <div class="container-fluid ">
            <div class="row " >

                <!--sidebar-->
                <!--sidebar is not bootstrap class-->
                <div class="col-xl-2 col-lg-3 col-md-4 sidebar fixed-top ">
                    <!--bottom border is not a CSS class-->
                    <a href="#" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 bottom-border">
                        <img class="figure-img" width="50" src="{{asset('images/icon.png')}}">
                        <span style = 'font-family: B Morvarid'>دونگی</span>
                    </a>
                    <div class="bottom-border pb-3" >
                        <img src="/uploads/avatars/{{auth()->user()->avatar}}" width="50" class="rounded-circle ml-3">
                        <a href="#" class="text-white">{{auth()->user()->name}}</a>
                    </div>
                    <ul class="navbar-nav flex-column mt-4">
                        <li class="nav-item ">
                            <a href="{{route('user')}}" class="nav-link text-white p-3 mb-2 sidebar-link {{'user'==request()->path()?'current':''}}"><i class="fas fa-home text-light fa-lg mr-3"></i> خانه</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.profile.show',auth()->user())}}" class="nav-link text-white p-3 mb-2 sidebar-link {{'user/'.auth()->user()->id.'/profile'==request()->path()?'current':''}}"><i class="fas fa-user text-light fa-lg mr-3"></i> پروفایل</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.groups',auth()->user())}}" class="nav-link text-white p-3 mb-2 sidebar-link {{'user/'.auth()->user()->id.'/groups'==request()->path()?'current':''}}"><i class="fas fa-users text-light fa-lg mr-3"></i> گروه ها</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.expenses',auth()->user())}}" class="nav-link text-white p-3 mb-2 sidebar-link {{'user/'.auth()->user()->id.'/expenses'==request()->path()?'current':''}}"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> هزینه ها</a>
                        </li>
                        <li class="nav-item">
                            <a href="/msg" class="nav-link text-white p-3 mb-2 sidebar-link {{'inbox'==request()->path()?'current':''}}"><i class="fas fa-envelope text-light fa-lg mr-3"></i> پیامها</a>
                        </li>


                    </ul>
                </div>
                <!--end of sidebar-->

                <!--top nav-->
                <!--top-navbar is not bootstrap class-->
                <div class="col-xl-2 col-lg-2 col-md-2 ml-auto bg-dark fixed-top py-2 top-navbar " style="border-radius: 0 7% 7% 0">
                            <ul class="navbar-nav">
                                <!-- icon-parent and icon-bullet are not bootstrap classes-->
                                <li class="nav-item icon-parent"><a class="nav-link icon-bullet" href="#"><i class="fas fa-comments text-muted fa-lg"></i></a></li>
                                <li class="nav-item icon-parent"><a class="nav-link icon-bullet" href="#"><i class="fas fa-bell text-muted fa-lg"></i></a></li>
                                <li class="nav-item ml-md-auto"><a class="nav-link" href="#" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg"></i></a></li>
                            </ul>
                        </div>

                </div>
                <!--end of top nav-->
            </div>
        </div>
    </div>
</nav>
<!--end of navbar-->
<!--modal-->
<div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> خروج از حساب کاربری</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                آیا مطمئن به خروج هستید؟
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ماندن</button>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn btn-danger" >خروج</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->
<section class="container-fluid">
        @if(\Illuminate\Support\Facades\Session::has('group-created'))
            <div class="row">
                <div class="col-xl-10 col-md-8 col-lg-9 ml-auto alert-success alert">{{\Illuminate\Support\Facades\Session::get('group-created')}}</div>
            </div>
        @endif
        @yield('content')
</section>


<!--cards-->
<section class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-md-8 col-lg-9 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
                <div class="col-xl-4 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                                <div class="text-right text-secondary">
                                    <h5>خرید ها</h5>
                                    <h3>
                                        @php
                                            $purchases = Illuminate\Support\Facades\DB::table('expenses')->where('payer','=',\Illuminate\Support\Facades\Auth::user()->id)->where('accepted','=','1')->sum('cost');
                                        echo number_format($purchases,2,'.',',');
                                        @endphp
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-secondary" onclick="window.location.reload()" style="cursor:pointer">
                                <i class="fas fa-sync mr-3"></i>
                                <span>بروز رسانی</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                    <div class="text-right text-secondary">
                                        <h5>دارايي</h5>
                                        <h3 style="direction: ltr">
                                            @php
                                            $debts = Illuminate\Support\Facades\DB::table('debts')->where('user_id','=',\Illuminate\Support\Facades\Auth::user()->id)->sum('cost');
                                            $demands = Illuminate\Support\Facades\DB::table('debts')->where('recipient','=',\Illuminate\Support\Facades\Auth::user()->id)->sum('cost');
                                            $purchases = Illuminate\Support\Facades\DB::table('expenses')->where('payer','=',\Illuminate\Support\Facades\Auth::user()->id)->where('accepted','=','1')->sum('cost');
                                            $expense = $demands - $debts - $purchases;
                                            echo number_format($expense,2,'.',',');
                                        @endphp
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary" onclick="window.location.reload()" style="cursor:pointer">
                            <i class="fas fa-sync mr-3"></i>
                            <span >بروز رسانی</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-users fa-3x text-info"></i>
                                <div class="text-right text-secondary">
                                    <h5>گروه ها</h5>
                                    <h3>{{\Illuminate\Support\Facades\Auth::user()->groups()->count()}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary" onclick="window.location.reload()" style="cursor:pointer">
                            <i class="fas fa-sync mr-3"></i>
                            <span >بروز رسانی</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end of cards-->

<!-- floating button -->

@if('user'==request()->path()?'current':'')
<a id="fab" style="display: inline-block;position: fixed;left:20px;bottom:20px;color:#eee;box-shadow:0px 5px 5px  gray;font-weight:bold;font-size:40px;width: 40px;height: 40px;border-radius: 50%;background:linear-gradient(to bottom,rgb(266,3,3),rgb(255,65,65));cursor: pointer;line-height: 40px" align="center"  data-toggle="modal" data-target="#newGroupModal">+</a>
@endif
<!-- end of floating button -->
<!-- New Group Modal -->
<!-- Modal -->
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">گروه جدید</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{-- TODO : change action attrib to  action="{{route('group.store')}}"             --}}
                    <form action="{{route('group.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="name">نام گروه</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="نام گروه">
                        </div>
                        <div class="form-group">
                            <label for="avatar">تصویر گروه</label>
                            <input type="file" name="avatar" id="avatar" class="form-control-file">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                            <button type="submit" class="btn btn-success">ایجاد گروه</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<!-- end of New Group Modal -->


<!-- footer -->
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row border-top pt-3">

                    <div class="col-lg-12 text-center">
                        <p>
                            &copy; Copyright 2020 Made With
                            <i class="fab fa-laravel text-danger"></i>
                            by <a class="text-success" href="https://rhjaf.github.io">RHJAR</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Scripts -->
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}"></script>

<!-- end of footer -->
<script src="{{asset('js/script.js')}}"></script>

<!-- AJAX for creating group -->
@yield('script')


</body>
</html>
