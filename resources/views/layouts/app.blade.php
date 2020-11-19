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

    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/iziToast/iziToast.min.css')}}">

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
                        @if(auth()->user()->unreadNotifications->count())
                            <span class="thereis_notifications badge badge-danger rounded-circle noti-icon-badge">{{auth()->user()->unreadNotifications->count()}}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-right">
                                    @if(auth()->user()->unreadNotifications->count())
                                        <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                    @endif
                                </span>Notifications
                            </h5>
                        </div>

                        <div class="noti-scroll" data-simplebar>
                        @if(auth()->user()->unreadNotifications->count())
                            @if(Auth::user()->role == 'admin')
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <!-- item-->
                                        <a href="{{$notification->data['link']}}" class="dropdown-item notify-item active">
                                            <div class="notify-icon">
                                                <img src="{{asset('assets/images/users/'.$notification->data['employe']['avatar']) }}" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">{{$notification->data['employe']['prenom']}} {{$notification->data['employe']['nom']}} </p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>{{$notification->data['message']}}</small>
                                            </p>
                                        </a>
                                    @endforeach
                                @endif
                            @else
                                <p style="padding:23px !important;">No New Notifications</p>
                            @endif
                        </div>

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
                        <a href="{{route('profile')}}" class="dropdown-item notify-item">
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
                <a href="{{route('home')}}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('assets/images/logo-sm.png') }}" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                    <span class="logo-lg">
                                <img src="" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                </a>

                <a href="{{route('home')}}" class="logo logo-light text-center">
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
                <img src="{{asset('assets/images/users/'.Auth::user()->avatar)}}" alt="user-img" title="Mat Helme"
                     class="rounded-circle avatar-md">
                <div class="dropdown">
                    <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                       data-toggle="dropdown">{{Auth::user()->fullName()}}</a>
                    <div class="dropdown-menu user-pro-dropdown">

                        <!-- item-->
                        <a href="{{route('profile')}}" class="dropdown-item notify-item">
                            <i class="fe-user mr-1"></i>
                            <span>My Account</span>
                        </a>
                        <!-- item-->
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
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
                        <a href="{{route('home')}}"  @yield('active_dashboard') >
                            <i data-feather="airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                        <li>
                            <a href="#sidebarCRM" data-toggle="collapse" @yield('active_employees_link')>
                                <i data-feather="users"></i>
                                <span> Employees </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse @yield('show_employees_coolapse') " id="sidebarCRM">
                                <ul class="nav-second-level">
                                    <li>
                                        <a @yield('active_employees_list') href="{{route('employe.index')}}">Employees List</a>
                                        <a @yield('active_employees_add') href="{{route('employe.ajout')}}">New Employee</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    <li>
                        <a href="#sidebarClient" data-toggle="collapse" @yield('active_clients_link')>
                            <i data-feather="shopping-cart"></i>
                            <span> Clients </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse @yield('show_clients_coolapse') " id="sidebarClient">
                            <ul class="nav-second-level">
                                <li>
                                    <a @yield('active_clients_list')href="{{route('clients.index')}}">Clients List</a>
                                    <a @yield('active_clients_add')href="{{route('clients.ajout')}}">New Client</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#sidebarInvoice" data-toggle="collapse" @yield('active_invoices_link')>
                            <i data-feather="dollar-sign"></i>
                            <span> Invoices </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse @yield('show_invoices_coolapse')" id="sidebarInvoice">
                            <ul class="nav-second-level">
                                <li>
                                    <a @yield('active_invoices_list') href="{{route('factures.index')}}">Invoices List</a>
                                    <a @yield('active_invoices_add') href="{{route('facture.create')}}">New Invoice</a>
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
                                    <a @yield('active_contracts_list') href="{{route('contrats.index')}}">Contracts List</a>
                                    <a @yield('active_contracts_add')  href="{{route('contrat.create')}}">New Contract</a>
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

<script src="{{asset('assets/libs/iziToast/iziToast.min.js')}}" type="text/javascript"></script>

<!-- Errors & Messages -->
<script>
    @if($errors->all())
    @foreach($errors->all() as $message)
    iziToast.error({
        title: 'Erreur',
        message: '{{ $message }}',
        position: 'bottomRight'
    });
    @endforeach

    @elseif(session()->has('message'))
    iziToast.success({
        title: 'Succès',
        message: '{{ session()->get('message') }}',
        position: 'topRight'
    });

    @elseif(session()->has('error'))
    iziToast.error({
        title: 'Erreur',
        message: '{{ session()->get('error') }}',
        position: 'bottomRight'
    });
    @endif
    @if (session('status'))
    iziToast.success({
        title: 'Succès',
        message: '{{ session('status') }}',
        position: 'topRight'
    });
    @endif
    @if (session('success'))
    iziToast.success({
        title: 'Succès',
        message: '{{ session('success') }}',
        position: 'topRight'
    });
    @endif
    $('body').on('click','.notification-list', function () {
        $.ajax({
            url: '{{route('ajax.read_all_notifs')}}',
            method:'POST',
            data: {_token: '{{csrf_token()}}'
            },
            success: function () {
                // $('.noti-scroll').html('<p style="padding:23px !important;">No New Notifications</p>');
                $('.thereis_notifications').remove();
            }
        })
    });
</script>
@yield('js')

</body>
</html>
