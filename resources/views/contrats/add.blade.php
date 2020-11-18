@extends('layouts.app')
@section('active_contracts_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_contracts_add')
    style="color: #00acc1;"
@endsection
@section('show_contracts_coolapse')
    show
@endsection
@section('window_title')
    Add new Contract
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Add Contract</li>
                    </ol>
                </div>
                <h4 class="page-title">Add new Contract</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <form method="POST" action="{{ action('ContratController@store') }}">
                @csrf

                <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Parties</h5>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Employee <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="employe_id" id="product-category">
                                <option>Select</option>
                                @foreach($employes as $employe)
                                    <option  value="{{$employe->id}}">{{$employe->nom}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Client <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="client_id" id="product-category">
                                <option>Select</option>
                                @foreach($clients as $client)
                                    <option  value="{{$client->id}}">{{$client->nom}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Pricing</h5>

                <div class="form-group mb-3">
                    <label for="product-name">Total <span class="text-danger">*</span></label>
                    <input type="text" id="product-name" value="{{old('montant')}}" name="montant" class="form-control" placeholder="Enter the price">
                </div>

                <div class="form-group mb-3">
                    <label for="product-category">Payment Type <span class="text-danger">*</span></label>
                    <select class="form-control select2" name="modalite_paiement" id="product-category">
                        <option  selected value="monthly">monthly</option>
                        <option value="weekly">weekly</option>
                        <option   value="per year">per year</option>
                        <option  value="per project">per project</option>



                    </select>
                </div>

                    <div class="form-group mb-3">
                        <label for="aproduct-category">Service Type<span class="text-danger">*</span></label>
                        <select class="form-control select2" name="type_service_id" id="aproduct-category">
                            @foreach($type_services as $fad)
                                <option {{$loop->first ? 'selected' : ''}} value="{{$fad->id}}">{{$fad->libelle}}</option>
                            @endforeach

                        </select>
                    </div>

                <div class="form-group mb-3">
                    <label for="product-category">Payed with<span class="text-danger">*</span></label>
                    <select class="form-control select2" name="type_paiement" id="product-category">
                        <option selected value="check">check</option>
                        <option value="cash">cash</option>

                    </select>
                </div>

                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Dates</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Start Date <span class="text-danger">*</span></label>
                            <input type="date" value="{{old('date_debut')}}" name="date_debut" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="product-category">End Date <span class="text-danger">*</span></label>
                                <input type="date" value="{{old('date_fin')}}" name="date_fin" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Description & Notes</h5>
                <div class="form-group mb-3">
                    <label for="product-category">Client Notes </label>
                    <textarea name="client_description" id="" class="form-control" cols="30" rows="5" placeholder="Notes By client">{{old('client_description')}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="product-category">Employee Notes </label>
                    <textarea name="employe_description" id="" class="form-control" cols="30" rows="5" placeholder="Notes By Employee">{{old('employe_description')}}</textarea>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Statuses</h5>
                <div class="form-group mb-3">
                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                    <br/>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio1" value="Active" name="etat" checked>
                        <label for="inlineRadio1"> Active </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="Renewed" name="etat">
                        <label for="inlineRadio2"> Renewed </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="Stopped" name="etat">
                        <label for="inlineRadio2"> Stopped </label>
                    </div>
                </div>
            </div> <!-- end card-box -->
                <div class="row">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </form>

        </div> <!-- end col -->

    </div>
    <!-- end row -->




    <!-- file preview template -->
    <div class="d-none" id="uploadPreviewTemplate">
        <div class="card mt-1 mb-0 shadow-none border">
            <div class="p-2">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                    </div>
                    <div class="col pl-0">
                        <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                        <p class="mb-0" data-dz-size></p>
                    </div>
                    <div class="col-auto">
                        <!-- Button -->
                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                            <i class="dripicons-cross"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')@endsection

