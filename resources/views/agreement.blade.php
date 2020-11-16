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
            <div class="card-box">
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Parties</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Employee <span class="text-danger">*</span></label>
                            <select class="form-control select2" id="product-category">
                                <option>Select</option>
                                <optgroup label="Shopping">
                                    <option selected value="SH1">Sarah Jenane</option>
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Client <span class="text-danger">*</span></label>
                            <select class="form-control select2" id="product-category">
                                <option>Select</option>
                                <optgroup label="Shopping">
                                    <option selected value="SH1">Inovatis</option>
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
                    </div>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Pricing</h5>

                <div class="form-group mb-3">
                    <label for="product-name">Total <span class="text-danger">*</span></label>
                    <input type="text" id="product-name" class="form-control" placeholder="e.g : John Smith">
                </div>

                <div class="form-group mb-3">
                    <label for="product-category">Payment Type <span class="text-danger">*</span></label>
                    <select class="form-control select2" id="product-category">
                        <option>Select</option>
                        <optgroup label="Shopping">
                            <option selected value="SH1">Monthly</option>
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
                    <label for="product-category">Payed with<span class="text-danger">*</span></label>
                    <select class="form-control select2" id="product-category">
                        <option>Select</option>
                        <optgroup label="Shopping">
                            <option selected value="SH1">Bank Transfer</option>
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

                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Dates</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="product-category">Start Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3">
                                <label for="product-category">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Description & Notes</h5>
                <div class="form-group mb-3">
                    <label for="product-category">Client Notes </label>
                    <textarea name="" id=""class="form-control" cols="30" rows="5" placeholder="Notes By client"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="product-category">Employee Notes </label>
                    <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Notes By Employee"></textarea>
                </div>
                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Statuses</h5>
                <div class="form-group mb-3">
                    <label class="mb-2">Status <span class="text-danger">*</span></label>
                    <br/>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio1" value="option1" name="radioInline" checked="">
                        <label for="inlineRadio1"> Active </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2"> Renewed </label>
                    </div>
                    <div class="radio form-check-inline">
                        <input type="radio" id="inlineRadio2" value="option2" name="radioInline">
                        <label for="inlineRadio2"> Stopped </label>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center mb-3">
                <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                <button type="button" class="btn w-sm btn-success waves-effect waves-light">Save</button>
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

