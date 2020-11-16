@extends('layouts.app')
@section('active_employees_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_employees_list')
    style="color: #00acc1;"
@endsection
@section('show_employees_coolapse')
    show
@endsection
@section('window_title')
    Employees List
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Employees list</li>
                    </ol>
                </div>
                <h4 class="page-title">Employees List</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Employee</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success mb-2 mr-1"><i class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 mr-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Full Name</th>
                                <th>Job Title</th>
                                <th>Phone</th>
                                <th>Joined at</th>
                                <th>Status</th>
                                <th style="width: 75px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Select</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="{{asset('assets/images/users/anouar.jpg')}}" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Anouar Khemeja</a>
                                </td>
                                <td>CTO</td>
                                <td>53 214 689</td>
                                <td>
                                    August 05 2010
                                </td>
                                <td>
                                    <span class="badge badge-soft-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Select</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="{{asset('assets/images/users/sarra.jpg')}}" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Sarah Jenane</a>
                                </td>
                                <td>Segment Manager</td>
                                <td>54 254 298</td>
                                <td>
                                    December 12 2018
                                </td>
                                <td>
                                    <span class="badge badge-soft-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2">Select</label>
                                    </div>
                                </td>
                                <td class="table-user">
                                    <img src="{{asset('assets/images/users/abir.jpg')}}" alt="table-user" class="mr-2 rounded-circle">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Abir Chérif</a>
                                </td>
                                <td>CEO</td>
                                <td>22 689 572</td>
                                <td>
                                    January 05 2015
                                </td>
                                <td>
                                    <span class="badge badge-soft-success">Active</span>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
@section('js')@endsection

