<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Gestion WR | @yield('window_title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico') }}">

		<!-- App css -->
		<link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="{{asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="{{asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="{{asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

		<!-- icons -->
		<link href="{{asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        @yield('css')
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="fe-maximize noti-icon"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fe-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">2</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notifications
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{asset('assets/images/users/anouar.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Anouar Khemeja</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Anouar has created a new Invoice</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{asset('assets/images/users/sarra.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sarah Jenane</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Sarra Renewed "Delice corp" Contract</small>
                                        </p>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{asset('assets/images/users/abir.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Abir Cherif</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Abir Added new tasks</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="fe-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('assets/images/users/'. Auth::user()->avatar) }}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    {{Auth::user()->nom}} <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="javascript:void(0);"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>

                            </div>
                        </li>


                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('assets/images/logo-light.png') }}" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="fe-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center d-block">
                        <img src="{{asset('assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">Yasmine Ayari</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user mr-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">{{Auth::user()->humanRole()}}</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="#" data-toggle="collapse"  @yield('active_dashboard') >
                                    <i data-feather="airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="#sidebarCRM" data-toggle="collapse" @yield('active_employees_link')>
                                    <i data-feather="users"></i>
                                    <span> Employees </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @yield('show_employees_coolapse') " id="sidebarCRM">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a @yield('active_employees_list') href="#">Employees List</a>
                                            <a @yield('active_employees_add') href="#">New Employee</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            @if(Auth::user()->role == 'admin')
                                <li>
                                    <a href="#sidebarClient" data-toggle="collapse" @yield('active_clients_link')>
                                        <i data-feather="shopping-cart"></i>
                                        <span> Clients </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse @yield('show_clients_coolapse') " id="sidebarClient">
                                        <ul class="nav-second-level">
                                            <li>
                                                <a @yield('active_clients_list')href="#">Clients List</a>
                                                <a @yield('active_clients_add')href="#">New Client</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endif

                            <li>
                                <a href="#sidebarInvoice" data-toggle="collapse" @yield('active_invoices_link')>
                                    <i data-feather="dollar-sign"></i>
                                    <span> Invoices </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse @yield('show_invoices_coolapse')" id="sidebarInvoice">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a @yield('active_invoices_list') href="#">Invoices List</a>
                                            <a @yield('active_invoices_add') href="#">New Invoice</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarContract" data-toggle="collapse" @yield('active_contracts_link') >
                                    <i data-feather="file-text"></i>
                                    <span> Contracts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse  @yield('show_contracts_coolapse') " id="sidebarContract">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a @yield('active_contracts_list') href="#">Contracts List</a>
                                            <a @yield('active_contracts_add')  href="#">New Contract</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        @yield('breadcrumbs')
                        <!-- end page title -->

                        @yield('content')

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2010 - <script>document.write(new Date().getFullYear())</script> &copy; <a target="_blank" href="http://webradar.me/">Webradar.me</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        @yield('js')

    </body>
</html>
