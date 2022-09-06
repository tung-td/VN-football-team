@extends('admin.layout')
@section('title', 'User Manage')
@section('head_icon', 'person_add')
@section('heading', 'Add User')
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
                        <p style="color: red; font-size: 14px;">
                            <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if ($message) {
                                echo $message;
                                Session::put('message', null);
                            }
                            ?>
                        </p>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form action="{{route('user.add.handle')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                    <i class="material-icons" aria-hidden="true">badge</i>
                                                    </span>
                                                    <input name="name" type="text" class="form-control" placeholder="User Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                    <i class="material-icons" aria-hidden="true">password</i>
                                                    </span>
                                                    <input name="password" type="text" class="form-control" placeholder="User Password">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                    <i class="material-icons" aria-hidden="true">email</i>
                                                    </span>
                                                    <input name="email" type="text" class="form-control" placeholder="User Email">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                    <i class="material-icons" aria-hidden="true">add_ic_call</i>
                                                    </span>
                                                    <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                                                </div>
                                                <select name="remember_token" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Staff</option>
                                                    <option value="">Client</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">home</i>
                                                    </span>
                                                    <input name="street_address" type="text" class="form-control" placeholder="Street Address">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">short_text</i>
                                                    </span>
                                                    <input name="district" type="text" class="form-control" placeholder="Distric">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">apartment</i>
                                                    </span>
                                                    <input name="city" type="text" class="form-control" placeholder="City">
                                                </div>
                                                <select name="status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="unlocked">Unlocked</option>
                                                    <option value="locked">Locked</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_product" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
                                                    </button>
                                                <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
                                                    </button>
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