@extends('layouts.app')
@section('active_dashboard')
    style="color: #00acc1;"
@endsection
@section('window_title')
    Dashboard
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        @if(Auth::user()->role == 'admin')
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-blue rounded">
                                <i class="fe-users avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1">
                                    <span data-plugin="counterup">{{$nb_employes}}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Employees</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-success rounded">
                                <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_clients}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Clients</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-warning rounded">
                                <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_factures}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Factures</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-info rounded">
                                <i class="fe-file-text avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_contrats}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Contrats</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        @else
            <div class="col-md-4 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-success rounded">
                                <i class="fe-shopping-cart avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_clients}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Clients</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-4 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-warning rounded">
                                <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_factures}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Factures</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-md-4 col-xl-4">
                <div class="card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-sm bg-info rounded">
                                <i class="fe-file-text avatar-title font-22 text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark my-1"><span data-plugin="counterup">{{$nb_contrats}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Contrats</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-box-->
            </div> <!-- end col -->

        @endif
    </div>
@endsection
@section('js')@endsection

