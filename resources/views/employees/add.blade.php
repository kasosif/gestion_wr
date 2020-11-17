@extends('layouts.app')
@section('active_employees_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_employees_add')
    style="color: #00acc1;"
@endsection
@section('show_employees_coolapse')
    show
@endsection
@section('window_title')
    Add Employee
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
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
                <h4 class="page-title">Add new Employee</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{route('employe.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">
                        <label for="product-edate">Joined At <span class="text-danger">*</span></label>
                        <input name="date_embauche" max="{{date('Y-m-d',strtotime('today'))}}" type="date" id="product-edate" class="form-control" >
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="product-name">First Name <span class="text-danger">*</span></label>
                                <input name="prenom" type="text" id="product-name" class="form-control" placeholder="e.g : John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="product-lname">Last Name <span class="text-danger">*</span></label>
                                <input name="nom" type="text" id="product-lname" class="form-control" placeholder="e.g : Smith">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-reference">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" id="product-reference" class="form-control" placeholder="e.g : john@wr.me">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" name="telephone" class="form-control" id="product-price" placeholder="Enter Phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-category">Job Title <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="poste" id="product-category">
                            <option>Select</option>
                            <optgroup label="Shopping">
                                <option selected value="SH1">Developer</option>
                                <option value="SH2">Shopping 2</option>
                                <option value="SH3">Shopping 3</option>
                                <option value="SH4">Shopping 4</option>
                            </optgroup>
                            <optgroup label="CRM">
                                <option value="CRM1">Crm 1</option>
                                <option value="CRM2">Crm 2</option>
                                <option value="CRM3">Crm 3</option>
                                <option value="CRM4">Crm 4</option>
                            </optgroup>
                            <optgroup label="eCommerce">
                                <option value="E1">eCommerce 1</option>
                                <option value="E2">eCommerce 2</option>
                                <option value="E3">eCommerce 3</option>
                                <option value="E4">eCommerce 4</option>
                            </optgroup>

                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="address">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="adresse" id="address" cols="30" rows="5" style="resize: none;"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <br/>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio1" value="1" name="is_valid" checked="">
                            <label for="inlineRadio1"> Active </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio2" value="0" name="is_valid">
                            <label for="inlineRadio2"> Blocked </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                            </div>
                        </div> <!-- end col -->
                    </div>

                </div> <!-- end card-box -->
            </div> <!-- end col -->

            <div class="col-lg-4">

                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Employee Picture</h5>

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
            'allowedFileExtensions': ["jpeg", "jpg", "png"],
            'minFileSize': 5,
            'maxFileSize': 2200
        });
    </script>
@endsection

