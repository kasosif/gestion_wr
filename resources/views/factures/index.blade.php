@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoice</a></li>
                        <li class="breadcrumb-item active">Invoice list</li>
                    </ol>
                </div>
                <h4 class="page-title">Facture</h4>
            </div>
        </div>
    </div>@endsection
@section('active_invoices_list')
    class="active"
@endsection
@section('show_invoices_coolapse')
    collapsed in
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Basic Data Table</h4>
                <p class="text-muted font-13 mb-4">
                    DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction
                    function:
                </p>

                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>Client</th>
                        <th>Objet</th>
                        <th>Actions</th>

                    </tr>
                    </thead>


                    <tbody>
                    @foreach($factures as $facture)
                        <tr>
                            <td>{{$facture->client->nom}}</td>
                            <td>{{$facture->objet}}</td>
                            <td>
                                <a href="{{route('facture.edit',$facture->id)}}" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('facture.show',$facture->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>

                            @if(Auth::user()->role=='admin')
                                    <a  onclick="displayDeleteModal({{$facture->id}})" class="btn btn-danger" ><i class="fas fa-trash-alt" style="color: #fff"></i></a>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
        <div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-top">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="topModalLabel">Modal Heading</h4>
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
    </div>

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
