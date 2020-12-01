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
                    <div class="bottom-border pb-3 " >
                        <img src="{{asset('images/admin.jpg')}}" width="50" class="rounded-circle ml-3">
                        <a href="#" class="text-white">علی علوی</a>
                    </div>
                    <ul class="navbar-nav flex-column mt-4">
                        <li class="nav-item ">
                            <a href="#" class="nav-link text-white p-3 mb-2 current"><i class="fas fa-home text-light fa-lg mr-3"></i> خانه</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-user text-light fa-lg mr-3"></i> پروفایل</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-users text-light fa-lg mr-3"></i> گروه ها</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-envelope text-light fa-lg mr-3"></i> پیامها</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white p-3 mb-2 sidebar-link"><i class="fas fa-shopping-cart text-light fa-lg mr-3"></i> هزینه ها</a>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">خروج</button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->
@yield('content')
<!--cards-->
<section class="container-fluid">
    <div class="row">
        <div class="col-xl-10 col-md-8 col-lg-9 ml-auto">
            <div class="row pt-md-5 mt-md-3 mb-5">
                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                                <div class="text-right text-secondary">
                                    <h5>Sales</h5>
                                    <h3>$135,000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary">
                            <i class="fas fa-sync mr-3"></i>
                            <span>Updated Now</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                <div class="text-right text-secondary">
                                    <h5>Expensess</h5>
                                    <h3>$39,000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary">
                            <i class="fas fa-sync mr-3"></i>
                            <span>Updated Now</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-users fa-3x text-info"></i>
                                <div class="text-right text-secondary">
                                    <h5>Users</h5>
                                    <h3>$15,000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary">
                            <i class="fas fa-sync mr-3"></i>
                            <span>Updated Now</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-2">
                    <div class="card card-common">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <i class="fas fa-chart-line fa-3x text-danger"></i>
                                <div class="text-right text-secondary">
                                    <h5>Visitors</h5>
                                    <h3>45,000</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-secondary">
                            <i class="fas fa-sync mr-3"></i>
                            <span>Updated Now</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end of cards-->
<!--tables-->
<section>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center">
                    <div class="col-12 mb-4 col-xl-6 mb-xl-0">
                        <h3 class="text-muted text-center mb-3">Staff  Salary</h3>
                        <table class="table bg-light text-center table-striped"><!-- table-striped should be assigned to tables and it makes them more nice.It will make them one after another white and black-->

                            <thead>
                            <tr class="text-muted">
                                <th>#</th>
                                <th>Name</th>
                                <th>Salary</th>
                                <th>Date</th>
                                <th>Contact</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>John</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><button class="btn btn-info btn-sm">Message</button></td><!-- btn-sm=small button -->
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Ann</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><button class="btn btn-info btn-sm">Message</button></td><!-- btn-sm=small button -->
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Mark</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><button class="btn btn-info btn-sm">Message</button></td><!-- btn-sm=small button -->
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>Marry</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><button class="btn btn-info btn-sm">Message</button></td><!-- btn-sm=small button -->
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>Bob</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><button class="btn btn-info btn-sm">Message</button></td><!-- btn-sm=small button -->
                            </tr>
                            </tbody>
                        </table>
                        <!-- pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        <span>&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link py-2 px-3">
                                        1
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        2
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        3
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        <span>&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- end of pagination -->
                    </div>
                    <div class="col-12 col-xl-6">
                        <h3 class="text-muted text-center mb-3">Payments</h3>
                        <table class="table text-center table-dark table-hover">
                            <thead>
                            <tr class="text-muted">
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>1</th>
                                <td>Monica</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Ncik</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Alex</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>Jane</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>Micheal</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-success w-75 py-2">Approved</span></td>
                            </tr>
                            <tr>
                                <th>6</th>
                                <td>Kate</td>
                                <td>$2000</td>
                                <td>25/05/2019</td>
                                <td><span class="badge badge-danger w-75 py-2">Pending</span></td>
                            </tr>




                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        <span>Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link py-2 px-3">
                                        1
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        2
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        3
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link py-2 px-3">
                                        <span>Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end of tables-->
<!-- progress /tasklist -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row mb-4 align-items-center">
                    <div class="col-xl-6 col-12 mb-4 mb-xl-0">
                        <div class="bg-dark text-white p-4 rounded">
                            <h4 class="mb-5">Conversion Rate</h4>
                            <h6 class="mb-3">Google Chrome</h6>
                            <div class="progress mb-4" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped font-weight-bold" style="width: 91%;">91%</div>
                            </div>
                            <h6 class="mb-3">Mozila Firefox</h6>
                            <div class="progress mb-4" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped font-weight-bold bg-success" style="width: 82%;">821%</div>
                            </div>
                            <h6 class="mb-3">Safari</h6>
                            <div class="progress mb-4" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped font-weight-bold bg-danger" style="width: 68%;">68%</div>
                            </div>
                            <h6 class="mb-3">IE</h6>
                            <div class="progress mb-4" style="height: 20px;">
                                <div class="progress-bar progress-bar-striped font-weight-bold bg-info" style="width: 21%;">21%</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <h4 class="text-muted p-3 mb-3">Tasks :</h4>
                        <div class="container-fluid bg-white">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>edit</h6>" >
                                        <i class="fas fa-edit fa-lg text-success mr-2"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>delete</h6>" >
                                        <i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-white">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>edit</h6>" >
                                        <i class="fas fa-edit fa-lg text-success mr-2"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>delete</h6>" >
                                        <i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-white">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>edit</h6>" >
                                        <i class="fas fa-edit fa-lg text-success mr-2"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>delete</h6>" >
                                        <i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-white">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>edit</h6>" >
                                        <i class="fas fa-edit fa-lg text-success mr-2"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>delete</h6>" >
                                        <i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid bg-white">
                            <div class="row py-3 mb-4 task-border align-items-center">
                                <div class="col-1">
                                    <input type="checkbox" checked>
                                </div>
                                <div class="col-sm-9 col-8">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>edit</h6>" >
                                        <i class="fas fa-edit fa-lg text-success mr-2"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="#" data-toggle="tooltip" data-placement="top" data-html="true" title="<h6>delete</h6>" >
                                        <i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- end of progress/tasklist -->
<!-- activites /quick post -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-xl-7">
                        <h4 class="text-muted mb-4">Recent Customer Activities</h4>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left"  data-toggle="collapse" data-target="#collapseOne">
                                        <img src="images/cust1.jpeg" width="50" class="mr-3 rounded">
                                        John posted a new comment
                                    </button>
                                </div>
                                <div class="collapse show" id="collapseOne" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>


                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseTwo" >
                                        <img src="images/cust2.jpeg" width="50" class="mr-3 rounded">
                                        Mark posted a new comment
                                    </button>
                                </div>
                                <div class="collapse" id="collapseTwo" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseThree" >
                                        <img src="images/cust3.jpeg" width="50" class="mr-3 rounded">
                                        Monica posted a new comment
                                    </button>
                                </div>
                                <div class="collapse" id="collapseThree" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFour" >
                                        <img src="images/cust4.jpeg" width="50" class="mr-3 rounded">
                                        Vivien posted a new comment
                                    </button>
                                </div>
                                <div class="collapse" id="collapseFour" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseFive" >
                                        <img src="images/cust5.jpeg" width="50" class="mr-3 rounded">
                                        Nick posted a new comment
                                    </button>
                                </div>
                                <div class="collapse" id="collapseFive" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapseSix" >
                                        <img src="images/cust6.jpeg" width="50" class="mr-3 rounded">
                                        Ann posted a new comment
                                    </button>
                                </div>
                                <div class="collapse" id="collapseSix" data-parent="#accordion">
                                    <div class="card-body" >
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad deleniti eos porro velit obcaecati totam, sapiente ratione eveniet tempora laboriosam ab est praesentium saepe quod!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-5 mt-5">
                        <div class="card rounded">
                            <div class="card-body">
                                <h5 class="text-muted text-center mb-4">Quick Status Post</h5>
                                <ul class="list-inline text-center py-3">
                                    <li class="list-inline-item mr-4">
                                        <a href="#">
                                            <i class="fas fa-pencil-alt text-success"></i>
                                            <span class="h6 text-muted">Status</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item mr-4">
                                        <a href="#">
                                            <i class="fas fa-camera text-info"></i>
                                            <span class="h6 text-muted">Photo</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fas fa-map-marker-alt text-primary"></i>
                                            <span class="h6 text-muted">Check-in</span>
                                        </a>
                                    </li>
                                </ul>
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control py-2 mb-3" placeholder="What's your status...">
                                        <button type="button" class="btn btn-block text-uppercase font-weight-bold text-light bg-info py-2 mb-5">Submit Post</button>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <i class="far fa-calendar-alt fa-8x text-warning d-block m-auto py-3"></i>
                                            <div class="card-body">
                                                <p class="card-text text-center font-weight-bold text-uppercase">
                                                    Mon, may 26
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="card bg-light">
                                            <i class="far fa-clock fa-8x text-danger d-block m-auto py-3"></i>
                                            <div class="card-body">
                                                <p class="card-text text-center font-weight-bold text-uppercase">
                                                    3:50 am
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@yield('content')










<!-- floating button -->
<div id="fab" style="display: inline-block;position: fixed;left:20px;bottom:20px;color:#eee;box-shadow:0px 5px 5px  gray;font-weight:bold;font-size:40px;width: 40px;height: 40px;border-radius: 50%;background:linear-gradient(to bottom,rgb(266,3,3),rgb(255,65,65));cursor: pointer" align="center" data-toggle="modal" data-target="#newGroupModal">+</div>
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
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="group_name">نام گروه</label>
                            <input type="text" name="group_name" id="title" class="form-control" placeholder="نام گروه">
                        </div>
                        <div class="form-group">
                            <label for="file">تصویر گروه</label>
                            <input type="file" name="file" id="group_image" class="form-control-file">
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">انصراف</button>
                <button type="submit" class="btn btn-success">ایجاد گروه</button>
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
                    <div class="col-lg-6 text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item mr-2">
                                <a href="#"class="text-dark">
                                    CodeAndCreate
                                </a>
                            </li>
                            <li class="list-inline-item mr-2">
                                <a href="#"class="text-dark">
                                    About
                                </a>
                            </li>
                            <li class="list-inline-item mr-2">
                                <a href="#"class="text-dark">
                                    Support
                                </a>
                            </li>
                            <li class="list-inline-item mr-2">
                                <a href="#"class="text-dark">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-center">
                        <p>
                            &copy;2018 Copyright.Made With
                            <i class="fas fa-heart text-danger"></i>
                            by <span class="text-success">CodeAndCreate</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer -->
<script src="{{asset('js/script.js')}}"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Scripts -->
<script src="{{ asset('js/bootstrap.js') }}" defer></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
