@extends('layouts.app')
@section('active_clients_link')
    style="color: #00acc1;"
    aria_hidden=true
@endsection
@section('active_clients_add')
    style="color: #00acc1;"
@endsection
@section('show_clients_coolapse')
    show
@endsection
@section('window_title')
    Add Client
@endsection
@section('css')@endsection
@section('breadcrumbs')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Webradar</a></li>
                        <li class="breadcrumb-item active">Add Client</li>
                    </ol>
                </div>
                <h4 class="page-title">Add new Client</h4>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                <div class="form-group mb-3">
                    <label for="product-name">Full Name <span class="text-danger">*</span></label>
                    <input type="text" id="product-name" class="form-control" placeholder="e.g : John Smith">
                </div>

                <div class="form-group mb-3">
                    <label for="product-reference">Email <span class="text-danger">*</span></label>
                    <input type="text" id="product-reference" class="form-control" placeholder="e.g : john@wr.me">
                </div>

                <div class="form-group mb-3">
                    <label for="product-price">Phone Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="product-price" placeholder="Enter Phone">
                </div>
                <div class="form-group mb-3">
                    <label for="product-category">Job Title <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="product-category">
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
                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                    <br/>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                        <label for="inlineRadio1"> Active </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2"> Blocked </label>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="col-lg-4">

            <div class="card-box">
                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Client Picture</h5>

                <form action="/" method="post" class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"
                      data-upload-preview-template="#uploadPreviewTemplate">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dz-message needsclick">
                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                        <h3>Drop files here or click to upload.</h3>
                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                                <strong>not</strong> actually uploaded.)</span>
                    </div>
                </form>

                <!-- Preview -->
                <div class="dropzone-previews mt-3" id="file-previews"></div>

            </div> <!-- end col-->

        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                <button type="button" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                <button type="button" class="btn w-sm btn-danger waves-effect waves-light">Delete</button>
            </div>
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

