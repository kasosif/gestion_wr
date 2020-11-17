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
                            <a href="{{route('clients.ajout')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Client</a>
                        </div>
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
                            @foreach($clients as $client)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Select</label>
                                        </div>
                                    </td>
                                    <td class="table-user">
                                        <img style="max-width: 70px" src="{{asset('assets/images/users/'.$client->avatar)}}" alt="table-user" class="mr-2">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$client->nom}}</a>
                                    </td>
                                    <td> Mars 05 2019</td>
                                    <td>{{$client->telephone}}</td>
                                    <td>
                                        {{date('F m Y',strtotime($client->created_at))}}
                                    </td>
                                    <td>
                                        @if($client->etat == 'Prospect')
                                            <span class="badge badge-soft-success">Prospect</span>
                                        @else
                                            <span class="badge badge-success">Client</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('clients.edit',$client->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="#" onclick="displayDeleteModal('{{$client->id}}','{{$client->nom}}')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

    <div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-top">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Delete Employe Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div id="top-modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <form method="POST" id="top-modal-form" action="">
                        @csrf @method('delete')
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('js')
    <script>
        function displayDeleteModal(id,name) {
            $('#top-modal-body').html('Are you sure to delete client : " '+name+' "');
            $('#top-modal-form').attr('action','{{route('clients.destroy')}}/'+id);
            $('#top-modal').modal('show');
        }
    </script>

@endsection

