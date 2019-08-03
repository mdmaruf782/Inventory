<!DOCTYPE html>
<html  dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta content="Fully Responsive Bootstrap 4 Admin Dashboard Template" name="description">
    <meta content="Spruko" name="author">

    <!-- Title -->
    <title>Inventory</title>

    <!-- Favicon -->
    <link href="{{ asset('backend/assets/img/brand/favicon.png')}}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('backend/assets/css/icons.css')}}" rel="stylesheet">

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Adon CSS -->
    <link href="{{ asset('backend/assets/css/dashboard.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom scroll bar css-->
    <link href="{{ asset('backend/assets/plugins/customscroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!-- Sidemenu Css -->
    <link href="{{ asset('backend/assets/plugins/toggle-sidebar/css/sidemenu.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

    {{-- laravel default resource --}}
    {{-- <link href="{{ asset('css/app.css')}}" rel="stylesheet"> --}}

    <!-- Data table css -->
	<link href="{{asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />

</head>
<body class="app sidebar-mini rtl" >
    <div id="app">
    <div id="global-loader" ></div>
    <div class="page">
        <div class="page-main">
            <!-- Sidebar menu-->
            <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            <aside class="app-sidebar " v-show="$route.path === '/' || $route.path === '/register' || $route.path  == 'forget' ? false : true">
                <div class="sidebar-img">
                    <a class="navbar-brand" href="index.html"><img alt="..." class="navbar-brand-img main-logo" src="{{ URL::to('backend/assets/img/brand/logo-dark.png')}}"> <img alt="..." class="navbar-brand-img logo" src="{{ URL::to('backend/assets/img/brand/logo.png')}}"></a>
                    <ul class="side-menu">
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                    <a class="slide-item" href="index.html">Finance Dashboard</a>
                                </li>
                                <li>
                                    <a class="slide-item" href="dashboard-service.html">Service Dashboard</a>
                                </li>
                                <li>
                                    <a class="slide-item" href="dashboard-hr.html">HR Dashboard</a>
                                </li>
                                <li>
                                    <a class="slide-item" href="dashboard-Entertainment.html">Entertainment Dashboard</a>
                                </li>
                                <li>
                                    <a class="slide-item" href="dashboard-game.html">Game Dashboard</a>
                                </li>

                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Employee</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/create-employee" class="slide-item">Create employee</router-link>
                                    <router-link to="/all-employee" class="slide-item">All employee</router-link>

                                </li>
                                
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Supplier</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/create-supplier" class="slide-item">Create Supplier</router-link>
                                    <router-link to="/all-supplier" class="slide-item">All Supplier</router-link>

                                </li>
                                
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/create-category" class="slide-item">Create Category</router-link>
                                    <router-link to="/all-category" class="slide-item">All Category</router-link>

                                </li>
                                
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Product</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/Create-Product" class="slide-item">Create Product</router-link>
                                    <router-link to="/Products" class="slide-item">All Products</router-link>

                                </li>
                                
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Expenses</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/Create-Expense" class="slide-item">Create Expense</router-link>
                                    <router-link to="/Expenses" class="slide-item">All Expenses</router-link>

                                </li>
                                
                            </ul>
                        </li>
                         <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-underline"></i><span class="side-menu__label">Salary</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li>
                                   
                                    <router-link to="/pay-salary" class="slide-item">Pay Salary</router-link>
                                    <router-link to="/Expenses" class="slide-item">Salary Report</router-link>

                                </li>
                                
                            </ul>
                        </li>
                        
                        <li>
                            <router-link  class="side-menu__item" to="/logout"><i class="side-menu__icon fa fa-question-circle"></i><span class="side-menu__label">Logout</span></router-link>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- Sidebar menu-->

            <!-- app-content-->
            <div class="app-content ">
                <div class="side-app">
                    <div class="main-content">
                        <div class="p-2 d-block d-sm-none navbar-sm-search" v-show="$route.path === '/' || $route.path === '/register' || $route.path  == 'forget' ? false : true">
                            <!-- Form -->
                            <form class="navbar-search navbar-search-dark form-inline ml-lg-auto">
                                @csrf
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div><input class="form-control" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Top navbar -->
                        <nav class="navbar navbar-top  navbar-expand-md navbar-dark" id="navbar-main" v-show="$route.path === '/' || $route.path === '/register' || $route.path  == 'forget' ? false : true">
                            <div class="container-fluid">
                                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>

                                <!-- Horizontal Navbar -->
                                <ul class="navbar-nav align-items-center d-none d-xl-block">
                                    <li class="nav-item dropdown">
                                    <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                                        Help
                                    </a>
                                    </li>
                                    <li class="nav-item dropdown ">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1 d-lg-block" data-toggle="dropdown" href="#" role="button">
                                            Mail <span class="badge badge-yellow badge-circle badge-sm h-5 w-5 text-xs">4</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right ">
                                            <a href="#" class="dropdown-item d-flex text-center">
                                                Mail Box
                                            </a>
                                            <a href="#" class="dropdown-item d-flex text-center">
                                                Compose mail
                                            </a>
                                            <a href="#" class="dropdown-item d-flex text-center">
                                                Seperated Link
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-center">View all Notification</a>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Brand -->
                                <a class="navbar-brand pt-0 d-md-none" href="index.html">
                                    <img src="{{ URL::to('backend/assets/img/brand/logo-dark.png')}}" class="navbar-brand-img" alt="...">
                                </a>
                                <!-- Form -->
                                <form class="navbar-search navbar-search-dark form-inline ml-3  mr-lg-auto">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div><input class="form-control" placeholder="Search" type="text">
                                        </div>
                                    </div>
                                </form>
                                <!-- User -->
                                <!-- User -->
                                <ul class="navbar-nav align-items-center ">
                                    <li class="nav-item dropdown">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-md-0 mr-md-2 pl-1" data-toggle="dropdown" href="#" role="button">
                                            <div class="media align-items-center">
                                                <span class="avatar avatar-sm rounded-circle"><img alt="Image placeholder" src="{{ URL::to('backend/assets/img/faces/female/27.jpg')}}"></span>

                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                            <div class=" dropdown-header noti-title text-center border-bottom pb-3">
                                                    <h3 class="text-capitalize text-dark mb-1">Luna Klippel</h3>
                                                <h6 class="text-overflow m-0">Administrator</h6>
                                            </div>
                                            <a class="dropdown-item" href="user-profile.html"><i class="ni ni-single-02"></i> <span>My profile</span></a>
                                            <a class="dropdown-item" href="#"><i class="ni ni-settings-gear-65"></i> <span>Settings</span></a>
                                            <a class="dropdown-item" href="#"><i class=" ni ni-email-83"></i> <span>Chat</span></a>
                                            <a class="dropdown-item" href="#"><i class=" ni ni-single-02"></i> <span>Friends</span></a>
                                            <a class="dropdown-item" href="#"><i class="ni ni-calendar-grid-58"></i> <span>Activity</span></a>
                                            <a class="dropdown-item" href="#"><i class="ni ni-support-16"></i> <span>Support</span></a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="login.html"><i class="ni ni-user-run"></i> <span>Logout</span></a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown d-none d-md-flex">
                                        <a aria-expanded="false" aria-haspopup="true" title="languages" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-flag f-30 "></i>
                                        </div></a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right"><a href="#" class="dropdown-item d-flex align-items-center">
                                                <img src="{{ URL::to('backend/assets/img/flag-img/french_flag.jpg')}}" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                                <div>
                                                    <strong>French</strong>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex align-items-center">
                                                <img src="{{ URL::to('backend/assets/img/flag-img/germany_flag.jpg')}}" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                                <div>
                                                    <strong>Germany</strong>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex align-items-center">
                                                <img src="{{ URL::to('backend/assets/img/flag-img/italy_flag.jpg')}}" alt="flag-img" class="avatar avatar-sm  mr-3 align-self-center">
                                                <div>
                                                    <strong>Italy</strong>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex align-items-center">
                                                <img src="{{ URL::to('backend/assets/img/flag-img/russia_flag.jpg')}}" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                                <div>
                                                    <strong>Russia</strong>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex align-items-center">
                                                <img src="{{ URL::to('backend/assets/img/flag-img/spain_flag.jpg')}}" alt="flag-img" class="avatar avatar-sm mr-3 align-self-center">
                                                <div>
                                                    <strong>Spain</strong>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown d-none d-md-flex">
                                        <a aria-expanded="false" aria-haspopup="true" class="nav-link pr-0" data-toggle="dropdown" href="#" role="button">
                                        <div class="media align-items-center">
                                            <i class="fe fe-bell f-30 "></i>
                                        </div></a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-arrow dropdown-menu-right">
                                            <a href="#" class="dropdown-item d-flex">
                                                <div>
                                                    <strong>Someone likes our posts.</strong>
                                                    <div class="small text-muted">3 hours ago</div>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex">
                                                <div>
                                                    <strong> 3 New Comments</strong>
                                                    <div class="small text-muted">5  hour ago</div>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item d-flex">
                                                <div>
                                                    <strong> Server Rebooted.</strong>
                                                    <div class="small text-muted">45 mintues ago</div>
                                                </div>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-center">View all Notification</a>
                                        </div>
                                    </li>
                                    <li class="nav-item d-none d-md-flex">
                                        <div class="dropdown d-none d-md-flex mt-2 ">
                                            <a class="nav-link full-screen-link  pr-0"><i class="fe fe-maximize-2 floating " id="fullscreen-button"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Top navbar-->

                        <!-- Page content -->
                        <div class="container-fluid pt-8">
                           
                            <!-- vue component load here -->
                            <router-view>
                                

                            </router-view>

                            <!-- end -->

                            
                            <div style="height:80vh"></div>

                            <!-- Footer -->
                            <footer class="footer">
                                <div class="row align-items-center justify-content-xl-between">
                                    <div class="col-xl-6">
                                        <div class="copyright text-center text-xl-left text-muted">
                                            <p class="text-sm font-weight-500">Copyright 2018 © All Rights Reserved. Adon Dashboard Template</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <p class="float-right text-sm font-weight-500">Designed &amp; Passion With: <a href="#">Spurko</a></p>
                                    </div>
                                </div>
                            </footer>
                            <!-- Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- app-content -->
        </div>
    </div>
    <!-- Back to top -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- Adon Scripts -->
</div>

    <script src="{{ asset('js/app.js') }}"></script>

   

    <script src="{{ asset('backend/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/chart-circle/circle-progress.min.js') }}"></script>

    <!-- Optional JS -->
    <script src="{{ asset('backend/assets/plugins/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/chart.js/dist/Chart.extension.js') }}"></script>

    <!-- Fullside-menu Js-->
    <script src="{{ asset('backend/assets/plugins/toggle-sidebar/js/sidemenu.js') }}"></script>

    <!-- Custom scroll bar Js-->
    <script src="{{ asset('backend/assets/plugins/customscroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>

@if(Request::segment(1) === '/home')
    <script src="{{ asset('backend/assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/peitychart/peitychart.init.js') }}"></script>
     <script src="{{ asset('backend/assets/js/dashboard-finance.js') }}"></script> 

@endif
    <!-- peitychart -->
    

    <!-- Adon JS -->
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
   



</body>

</html>