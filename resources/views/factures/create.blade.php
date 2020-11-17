@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                         <li class="breadcrumb-item active">Ajout Client</li>
                    </ol>
                </div>
                <h4 class="page-title">Facture</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ action('FactureController@store') }}">
                                @csrf
                      <div class="row">
                         <div class="col-lg-6">
                             <div class="form-group mb-3">
                                 <label for="example-select">Customers</label>
                                 <select name="client_id" class="form-control" id="inputState">
                                     <option disabled>Select a Customer</option>
                                      @if(!$clients->count())
                                         <option>No Customer Available</option>
                                     @else
                                     @foreach($clients as $client)
                                         <option  value="{{$client->id}}">{{$client->nom}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                             </div>
                         </div>
                         <!-- end col -->
                          <div class="col-lg-6">

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Objet</label>
                                    <textarea required class="form-control" name="objet" id="example-textarea" rows="5"></textarea>
                                </div>
                         </div>

                    </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Ajouter</button>

                     </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('js')
 @endsection
