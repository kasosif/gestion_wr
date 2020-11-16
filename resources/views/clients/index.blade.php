@extends('layouts.app')
@section('active_clients_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_clients_list')
    style="color: #00acc1;"
@endsection
@section('show_clients_coolapse')
    show
@endsection
@section('window_title')
    Clients List
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Clients list</li>
                    </ol>
                </div>
                <h4 class="page-title">Clients List</h4>
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
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Client</a>
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
                                <th>Client Name</th>
                                <th>Last Contract at</th>
                                <th>Phone</th>
                                <th>Client Since</th>
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
                                    <img src="https://media.shemsfm.net/uploads/content/big/1585677670_content.jpg" alt="table-user" class="mr-2">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Delice Corp</a>
                                </td>
                                <td> Mars 05 2019</td>
                                <td>26 897 423</td>
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
                                    <img src="https://media.shemsfm.net/uploads/content/big/1585677670_content.jpg" alt="table-user" class="mr-2">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Carrefour</a>
                                </td>
                                <td> October 16 2018</td>
                                <td>58 689 897</td>
                                <td>
                                    August 05 2015
                                </td>
                                <td>
                                    <span class="badge badge-soft-warning">Not Renewed</span>
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
                                    <img src="https://media.shemsfm.net/uploads/content/big/1585677670_content.jpg" alt="table-user" class="mr-2">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Peaudouce</a>
                                </td>
                                <td> April 22 2020</td>
                                <td>26 289 411</td>
                                <td>
                                    April 22 2020
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
                                    <img src="https://media.shemsfm.net/uploads/content/big/1585677670_content.jpg" alt="table-user" class="mr-2">
                                    <a href="javascript:void(0);" class="text-body font-weight-semibold">Inovatis</a>
                                </td>
                                <td>January 05 2019</td>
                                <td>26 897 423</td>
                                <td>
                                    January 05 2017
                                </td>
                                <td>
                                    <span class="badge badge-soft-danger">Stopped</span>
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
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">

            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete Client Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Are you sure you want to delete Client "Innovatis"
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" onclick="confirmDelete()">Delete</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')@endsection

