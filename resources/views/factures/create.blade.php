@extends('layouts.app')
@section('active_invoices_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_invoices_add')
    style="color: #00acc1;"
@endsection
@section('show_invoices_coolapse')
    show
@endsection
@section('window_title')
    New Invoice
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-fileinput/fileinput.min.css')}}">
@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">New Invoice</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="{{ route('facture.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <fieldset>
                            <legend>Client & Contract</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="clients">Client </label>
                                        <select class="form-control" name="client_id" id="clients">
                                            <option value="" selected disabled>Choose The Client</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->id}}">{{$client->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contract_id">Contract </label>
                                        <select class="form-control" name="contract_id" id="contract_id">
                                            <option value="" disabled selected>Choose Client First</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <fieldset>
                            <legend>Service</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="service">Service Title </label>
                                        <input type="text" id="service" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sdesc">Description</label>
                                        <input type="text" id="sdesc" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Pricing</legend>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sunity">Service Unity</label>
                                        <input type="text" id="sunity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="squantity">Service Quantity</label>
                                        <input type="text" id="squantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="srate">Service Rate</label>
                                        <input type="text" id="srate" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="card-footer">
                        <div class="pull-right">
                            <button onclick="addService()" type="button" class="btn btn-success">Add Service</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <tbody id="services">
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div>
                    </div>
                </div>
                <div class="card" id="object-card" style="display: none">
                    <div class="card-body">
                        <fieldset>
                            <legend>Object</legend>
                            <div class="form-group">
                                <label for="iobject">Invoice Object</label>
                                <input type="text" id="iobject" name="objet" class="form-control">
                            </div>
                        </fieldset>
                        <div class="row">
                            <button type="submit" class="btn btn-primary">
                                Create Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('js')
    <script>
        let total = 0;
        let id = 1;
        function addService() {
            let title = $('#service').val();
            let desc = $('#sdesc').val();
            let unity = $('#sunity').val();
            let price = $('#srate').val();
            let quantity = $('#squantity').val();
            if (!!title && !!unity && !!price && !!quantity) {
                let mytotal = parseInt(quantity) * parseFloat(price);
                $('#services').append(`<tr>
                                        <td>${id}</td>
                                        <td>
<input type="hidden" name="services[${id}][title]" value="${title}"  >
<input type="hidden" name="services[${id}][desc]" value="${desc}"  >
                                            <b>${title}</b> <br/>

                                            ${desc}
                                        </td>
<input type="hidden" name="services[${id}][qty]" value="${quantity}"  >
<input type="hidden" name="services[${id}][unity]" value="${unity}"  >
<input type="hidden" name="services[${id}][price]" value="${price}"  >

                                        <td>${quantity} ${unity}</td>
                                        <td>$${price}</td>
                                        <td class="text-right">$<span class="tot">${mytotal}</span></td>
                                    </tr>`);
                $('#service').val('');
                $('#sdesc').val('');
                $('#sunity').val('');
                $('#srate').val('');
                $('#squantity').val('');
                id++;
                $('#object-card').show();
            }
            return false;
        }

        $(document).ready(function () {
            $('body').on('change','#clients', function () {
                $.ajax({
                    url: '{{route('ajax.contracts')}}' + '/' + $(this).val(),
                    method: 'GET',
                    success: function (res) {
                        $('#contracts').html('<option value="" selected disabled>Choose The Contract</option>\n');
                        $.each(res.contracts, function (i,contract) {
                            $('#contracts').append(`<option value="${contract.id}">${contract.date_debut} => ${contract.date_fin} </option>`);
                        });
                    }
                });
            });
        });
    </script>
@endsection
