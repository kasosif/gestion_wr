@extends('layouts.app')
@section('active_invoices_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_invoices_list')
    style="color: #00acc1;"
@endsection
@section('show_invoices_coolapse')
    show
@endsection
@section('window_title')
    Invoices List
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Invoices list</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoices List</h4>
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
                            <a href="{{route('facture.create')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle mr-2"></i> New Invoice</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                            <thead>
                            <tr>
                                <th>Initiator</th>
                                <th>Client</th>
                                <th>Created At</th>
                                <th>Object</th>
                                <th style="width: 75px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($factures as $facture)
                                <tr>
                                    <td>{{$facture->initiator->fullName()}}</td>
                                    <td class="table-user">
                                        <img style="max-width: 70px" src="{{asset('assets/images/users/'.$facture->client->avatar)}}" alt="table-user" class="mr-2">
                                        <span class="text-body font-weight-semibold">{{$facture->client->nom}}</span>
                                    </td>
                                    <td>
                                        {{date('F m Y',strtotime($facture->created_at))}}
                                    </td>
                                    <td>
                                        {{$facture->objet}}
                                    </td>
                                    <td>
                                        <a href="{{route('facture.show',$facture->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        @if(Auth::user()->role == 'admin')
                                            <a href="#" onclick="displayDeleteModal('{{$facture->id}}')" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        @endif
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
                    <h4 class="modal-title" id="topModalLabel">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div id="top-modal-body" class="modal-body">

                </div>
                <div class="modal-footer">
                    <form method="POST" id="top-modal-form" action="">
                        @csrf
                        @method('delete')
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('js')
    <script src="{{asset("assets/js/pages/datatables.init.js")}}"></script>
    <script>
        function displayDeleteModal(id) {
            $('#top-modal-body').html('Are you sure to delete invoice with id : '+id);
            $('#top-modal-form').attr('action','{{url('/facture/destroy/')}}/'+id);
            $('#top-modal').modal('show');
        }
    </script>
@endsection
