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
    Edit Employee
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
                        <li class="breadcrumb-item"><a href="{{route('employe.index')}}">List Employees</a></li>
                        <li class="breadcrumb-item active">Edit Employee</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Employee</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <form action="{{route('employe.update',$employe->id)}}" enctype="multipart/form-data" method="POST">
        @method('put')
        @csrf()
        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                    <div class="form-group mb-3">
                        <label for="product-edate">Joined At <span class="text-danger">*</span></label>
                        <input value="{{$employe->date_embauche}}" name="date_embauche" max="{{date('Y-m-d',strtotime('today'))}}" type="date" id="product-edate" class="form-control" >
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="product-name">First Name <span class="text-danger">*</span></label>
                                <input value="{{$employe->prenom}}" name="prenom" type="text" id="product-name" class="form-control" placeholder="e.g : John">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="product-lname">Last Name <span class="text-danger">*</span></label>
                                <input value="{{$employe->nom}}" name="nom" type="text" id="product-lname" class="form-control" placeholder="e.g : Smith">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-reference">Email <span class="text-danger">*</span></label>
                        <input value="{{$employe->email}}" type="text" id="product-reference" name="email" class="form-control" placeholder="e.g : john@wr.me">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-price">Phone Number <span class="text-danger">*</span></label>
                        <input type="text" value="{{$employe->telephone}}" name="telephone" class="form-control" id="product-price" placeholder="Enter Phone">
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-category">Job Title <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="poste" id="product-category">
                            <option selected disabled value="">Choose Job Title</option>
                            <optgroup label="IT">
                                <option @if($employe->poste == 'Full Stack Developer') selected @endif value="Full Stack Developer">Full Stack Developer</option>
                                <option @if($employe->poste == 'Web Developer') selected @endif value="Web Developer">Web Developer</option>
                                <option @if($employe->poste == 'Designer') selected @endif value="Designer">Designer</option>
                                <option @if($employe->poste == 'CTO') selected @endif value="CTO">CTO</option>
                            </optgroup>
                            <optgroup label="Segments">
                                <option @if($employe->poste == 'Brands Segment Manager') selected @endif value="Brands Segment Manager">Brands Segment Manager</option>
                                <option @if($employe->poste == 'Academia Segment Manager') selected @endif value="Academia Segment Manager">Academia Segment Manager</option>
                                <option @if($employe->poste == 'Brands Segment Employee') selected @endif value="Brands Segment Employee">Brands Segment Employee</option>
                                <option @if($employe->poste == 'Academia Segment Employee') selected @endif value="Academia Segment Employee">Academia Segment Employee</option>
                            </optgroup>
                            <optgroup label="Production">
                                <option @if($employe->poste == 'Chief Of Production') selected @endif value="Chief Of Production">Chief Of Production</option>
                                <option @if($employe->poste == 'Commercial Representative') selected @endif value="Commercial Representative">Commercial Representative</option>
                            </optgroup>

                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2" for="address">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="adresse" id="address" cols="30" rows="5" style="resize: none;">{{$employe->adresse}}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <br/>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio1" value="1" name="is_valid" @if($employe->is_valid) checked @endif>
                            <label for="inlineRadio1"> Active </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio2" value="0" name="is_valid" @if(!$employe->is_valid) checked @endif>
                            <label for="inlineRadio2"> Blocked </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button type="reset" class="btn w-sm btn-light waves-effect">Cancel</button>
                                <button type="submit" class="btn w-sm btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </div> <!-- end col -->
                    </div>

                </div> <!-- end card-box -->
            </div> <!-- end col -->

            <div class="col-lg-4">

                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Employee Picture</h5>
                    @if($employe->avatar)
                        <img src="{{asset('assets/images/users/'.$employe->avatar)}}" alt="user image"
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
            'minFileSize': 5,
            'maxFileSize': 2200
        });
    </script>
@endsection

