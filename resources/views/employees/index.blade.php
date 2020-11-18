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
                            <a href="{{route('employe.ajout')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> Add Employee</a>
                        </div>

                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Job Title</th>
                                <th>Phone</th>
                                <th>Joined at</th>
                                <th>Status</th>
                                <th style="width: 75px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employes as $employe)
                                <tr>
                                    <td class="table-user">
                                        <img src="{{asset('assets/images/users/'.$employe->avatar)}}" alt="table-user" class="mr-2 rounded-circle">
                                        <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$employe->fullName()}}</a>
                                    </td>
                                    <td>{{$employe->humanRole()}}</td>
                                    <td>{{$employe->telephone}}</td>
                                    <td>
                                        {{date('F d Y',strtotime($employe->date_embauche))}}
                                    </td>
                                    <td>
                                        @if($employe->is_valid)
                                            <span class="badge badge-soft-success">Active</span>
                                        @else
                                            <span class="badge badge-soft-danger">Blocked</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{route('employe.edit',$employe->id)}}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="#" onclick="displayDeleteModal('{{$employe->id}}', '{{$employe->fullName()}}')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
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
            $('#top-modal-body').html('Are you sure to delete employe: '+name);
            $('#top-modal-form').attr('action','{{route('employe.destroy')}}/'+id);
            $('#top-modal').modal('show');
        }
    </script>

@endsection

