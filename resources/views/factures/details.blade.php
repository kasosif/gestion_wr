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
    Invoice Info
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Invoices list</a></li>
                        <li class="breadcrumb-item active">Invoice Info</li>
                    </ol>
                </div>
                <h4 class="page-title">Invoice Info</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @php($subtotal = 0)
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <!-- Logo & title -->
                <div class="clearfix">
                    <div class="float-left">
                        <div class="auth-logo">
                            <div class="logo logo-dark">
                                                    <span class="logo-lg">
                                                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="22">
                                                    </span>
                            </div>

                            <div class="logo logo-light">
                                                    <span class="logo-lg">
                                                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="22">
                                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <h4 class="m-0 d-print-none">Invoice #{{$facture->reference}} ({{$facture->client->nom}})</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-3">
                            <p><b>Hello, {{$facture->client->vis_a_vis}}</b></p>
                            <p class="text-muted">{{$facture->objet}}</p>
                        </div>

                    </div><!-- end col -->
                    <div class="col-md-4 offset-md-2">
                        <div class="mt-3 float-right">
                            <p class="m-b-10"><strong>Order Date : </strong> <span class="float-right"> &nbsp;&nbsp;&nbsp;&nbsp; {{date('F d Y',strtotime($facture->created_at))}}</span></p>
                            <p class="m-b-10"><strong>Order No. : </strong> <span class="float-right">{{$facture->reference}} </span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <h6>Billing Address</h6>
                        <address>
                            {{$facture->client->adresse}}
                        </address>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th style="width: 10%">Unity</th>
                                    <th style="width: 10%">Unity Rate</th>
                                    <th style="width: 10%" class="text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($facture->getServices() as $service)
                                    @php($subtotal = $subtotal + (floatval($service['price']) * intval($service['qty'])))
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <b>{{$service['title']}}</b> <br/>
                                            {{$service['desc']}}
                                        </td>
                                        <td>{{$service['qty']}} {{$service['unity']}}</td>
                                        <td>${{floatval($service['price'])}}</td>
                                        <td class="text-right">${{(floatval($service['price']) * intval($service['qty']))}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Notes:</h6>

                            <small class="text-muted">
                                All accounts are to be paid within 7 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 7 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                            </small>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-6">

                        @php($tax = $subtotal * 0.19)
                        <div class="float-right">
                            <p><b>Sub-total:</b> <span class="float-right">${{number_format($subtotal,2)}}</span></p>
                            <p><b>Tax (19%):</b> <span class="float-right"> &nbsp;&nbsp;&nbsp; ${{number_format($tax,2)}}</span></p>
                            <h3>${{number_format($tax + $subtotal,2)}} TND</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="mt-4 mb-1">
                    <div class="text-right d-print-none">
                        <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer mr-1"></i> Print</a>
                        <a href="{{route('factures.index')}}" class="btn btn-info waves-effect waves-light">Go Back To Invoices</a>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
@endsection
