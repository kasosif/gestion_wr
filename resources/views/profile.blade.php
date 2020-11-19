@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/libs/bootstrap-fileinput/fileinput.min.css')}}">
    <style>
        .file-input.file-input-ajax-new {
            max-width: 255px;
        }
    </style>
@endsection
@section('window_title') Profile @endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <!--left col-->
            <div class="card">
                <div class="card-header">
                    <h2>General</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div id="picture-container">
                                <center>
                                    <img title="profile image" class="thumbnail" style="max-width: 200px;margin-bottom: 10px"
                                         src="{{asset('assets/images/users/'.Auth::user()->avatar)}}"
                                    >
                                </center>
                                <div class="text-center m-t-5">
                                    <button class="btn btn-primary" id="changetof">Edit</button>
                                </div>
                            </div>
                            <div id="change-picture" style="display: none">
                                <form action="{{route('profile.changepicture')}}" class="form-inline" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PATCH">
                                    <div class="form-group">
                                        <input style="max-width: 200px;" type="file" width="30" name="image" id="imageuser">
                                    </div>
                                    <div class="form-group m-t-5">
                                        <input type="submit" class="btn btn-success" value="Change">
                                        <button type="button" class="btn btn-info" id="cancelimage">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Login</strong></span> {{Auth::user()->email}}</li>
                        <li class="list-group-item text-right">
                                <span class="pull-left">
                                    <strong class="">Role: </strong>
                                </span>
                            {{Auth::user()->humanRole()}}
                        </li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">Webradar(er) Since </strong></span> {{date('F d Y', strtotime( Auth::user()->date_embauche))}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-8" style="" contenteditable="false">
            <div class="card">
                <div class="card-header">
                    <h2>More Info </h2>
                </div>
                <div class="card-body" style="padding: 10px;">
                    <div id="details" class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="prenom" class="">First name</label>
                                <h2 id="prenom">{{Auth::user()->prenom}}</h2>
                            </div>

                            <div>
                                <label for="lieu_naissance" class="">Phone Number</label>
                                <h2 id="lieu_naissance">{{Auth::user()->telephone}}</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="cin" class="">Last Name</label>
                                <h2 id="cin">{{Auth::user()->nom}}</h2>
                            </div>
                            <div class="form-group">
                                <label for="date_naissance" class="">Added at</label>
                                <h2 id="date_naissance">{{date('F d Y', strtotime( Auth::user()->created_at))}}</h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary" id="changedetails">Edit</button>
                        </div>
                    </div>
                    <div style="display: none" id="formcontainer">
                        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product-name">First Name <span class="text-danger">*</span></label>
                                        <input name="prenom" value="{{Auth::user()->prenom}}" type="text" id="product-name" class="form-control" placeholder="e.g : John">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product-lname">Last Name <span class="text-danger">*</span></label>
                                        <input name="nom" value="{{Auth::user()->nom}}"  type="text" id="product-lname" class="form-control" placeholder="e.g : Smith">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="product-price">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" value="{{Auth::user()->telephone}}" name="telephone" class="form-control" id="product-price" placeholder="Enter Phone">
                            </div>
                            <div class="form-group mb-3">
                                <label class="mb-2" for="address">Address <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="adresse" id="address" cols="30" rows="5" style="resize: none;">{{Auth::user()->adresse}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-labeled btn-success">
                                <span class="btn-label"><i class="far fa-thumbs-up"></i></span>Edit
                            </button>
                            <button type="button" id="canceldetails" class="btn btn-labeled btn-danger">
                                <span class="btn-label"><i class="far fa-thumbs-down"></i></span>Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h2>Account <small>Change Your password</small></h2>
                </div>
                <div class="card-body" >
                    <form action="{{route('profile.changepassword')}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="password" class="">Current Password</label>
                            <input id="password" type="password" placeholder="Current Password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="">New Password</label>
                            <input id="new_password" type="password" placeholder="New Password" name="new_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation" class="">Confirm New Password </label>
                            <input id="new_password_confirmation" type="password" name="new_password_confirmation" placeholder="Confirm New Password " class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <span class="btn-label"><i class="far fa-thumbs-up"></i></span>Change Password
                        </button>
                    </form>
                </div>
            </div>
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="PUT">
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/libs/bootstrap-fileinput/fileinput.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('body').on('click','#changetof',function () {
                $("#picture-container").hide();
                $("#change-picture").show();
            });

            $('body').on('click','#cancelimage',function () {
                $("#picture-container").show();
                $("#change-picture").hide();
            });

            $('body').on('click','#changedetails',function () {
                $("#details").hide();
                $("#formcontainer").show();
            });

            $('body').on('click','#canceldetails',function () {
                $("#details").show();
                $("#formcontainer").hide();
            });

            $("#imageuser").fileinput({
                'showUpload': !1,
                'allowedFileExtensions': ["jpeg","jpg", "png"],
                'showCaption':!1,
                'maxFileSize': 2200
            });

        });
    </script>
@endsection



