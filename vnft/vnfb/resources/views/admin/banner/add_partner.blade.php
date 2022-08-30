@extends('admin.layout')
@section('title', 'Add Partner')
@section('head_icon', 'handshake')
@section('heading', 'Add Partner')
@section('admin_content')
<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <!-- <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Product</a></li>
                        </ul> -->
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form action="{{url('/luu-doi-tac')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="partner_name" type="text" class="form-control" placeholder="Partner Name">
                                                </div>
                                            </div>
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_link</i>
                                                    </span>
                                                    <input name="partner_link" type="text" class="form-control" placeholder="Partner Link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="partner_image" type="file" class="form-control" placeholder="Partner Image">
                                                </div>
                                            </div>
                                            <select name="partner_level" class="form-control pro-edt-select form-control-primary">
                                                <option value="1" selected>Primary Partner</option>
                                                <option value="2">Secondary Partner</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_partner" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
                                                    </button>
                                                <!-- <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                    </button> -->
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal ???-->
@endsection