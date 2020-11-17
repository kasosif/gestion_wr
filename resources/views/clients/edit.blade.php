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
    Edit Client
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
                        <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Client List</a></li>
                        <li class="breadcrumb-item active">Edit Client</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit existing Client</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{route('clients.update',$client->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">
                        <label for="product-tname"> Tax Registration number <span class="text-danger">*</span></label>
                        <input value="{{$client->matricule_fiscale}}" name="matricule_fiscale" type="text" id="product-tname" class="form-control" placeholder="e.g : 1234567AAA000">
                    </div>


                    <div class="form-group mb-3">
                        <label for="product-name">Brand Name <span class="text-danger">*</span></label>
                        <input value="{{$client->nom}}" name="nom" type="text" id="product-name" class="form-control" placeholder="e.g : Webradar TN">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-sss">Source Client <span class="text-danger">*</span></label>
                        <input value="{{$client->source_client}}" name="source_client" type="text" id="product-sss" class="form-control" placeholder="e.g : Facebook">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-treference">Vis a Vis <span class="text-danger">*</span></label>
                        <input value="{{$client->vis_a_vis}}" name="vis_a_vis" type="text" id="product-treference" class="form-control" placeholder="e.g : Mr John Smith">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-yreference">Email <span class="text-danger">*</span></label>
                        <input value="{{$client->email}}" type="text" name="email" id="product-yreference" class="form-control" placeholder="e.g : john@wr.me">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Phone Number <span class="text-danger">*</span></label>
                        <input value="{{$client->telephone}}" name="telephone" type="text" class="form-control" id="product-price" placeholder="Enter Phone">
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="address">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="adresse" id="address" cols="30" rows="5" style="resize: none;">{{$client->adresse}}</textarea>
                    </div>


                    <div class="form-group mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <br/>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio1" value="Prospect" name="etat" @if($client->etat == 'Prospect') checked @endif >
                            <label for="inlineRadio1"> Prospect </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio2" value="Client" name="etat" @if($client->etat == 'Client') checked @endif>
                            <label for="inlineRadio2"> Client </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                <button type="submit" class="btn w-sm btn-primary waves-effect waves-light">Edit</button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->

            <div class="col-lg-4">

                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Client Picture</h5>
                    @if($client->avatar)
                        <img src="{{asset('assets/images/users/'.$client->avatar)}}" alt="user image"
                             class="thumbnail mb-2" style="max-width: 200px">
                    @endif
                    <div class="input-group" style="width: 100%">
                        <input type="file" name="avatar" id="imageuser">
                    </div>

                </div> <!-- end col-->

            </div> <!-- end col-->
        </div>
    </form>

@endsection
@section('js')
    <script src="{{asset('assets/libs/bootstrap-fileinput/fileinput.min.js')}}"></script>
    <script>
        $("#imageuser").fileinput({
            'showUpload': !1,
            'showCaption': !1,
            'dropZoneEnabled': !1,
            'allowedFileExtensions': ["jpeg", "jpg", "png"],
            'maxFileSize': 2200
        });
    </script>
@endsection

