@extends('admin.layout')
@section('title', 'Add Player')
@section('head_icon', 'settings_accessibility')
@section('heading', 'Add Player')
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Player</a></li>
                        </ul> -->
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form action="{{URL('/save-player')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="player_name" type="text" class="form-control" placeholder="Player Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="player_image" type="file" class="form-control" placeholder="Product Image">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-new-file" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">filter_1</i>
                                                    </span>
                                                    <input name="player_shirt_num" type="number" class="form-control" placeholder="Player Shirt Number">
                                                </div>
                                                <select name="player_squad" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Men</option>
                                                    <option value="2">Women</option>
                                                    <option value="3">Youngs</option>
                                                    <option value="4">Legends</option>
                                                </select>
                                                <select name="player_position" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Goalkeeper</option>
                                                    <option value="2">Defender</option>
                                                    <option value="3">Midfielder</option>
                                                    <option value="4">Forward</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">cake</i>
                                                    </span>
                                                    <input name="player_birth" type="date" class="form-control" placeholder="Player Birthday">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">sports_soccer</i>
                                                    </span>
                                                    <input name="player_club" type="text" class="form-control" placeholder="Player Club">
                                                </div>
                                                <select name="player_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="unlocked">Unlocked</option>
                                                    <option value="locked">Locked</option>
                                                </select>
                                                <select name="player_gender" class="form-control pro-edt-select form-control-primary">
                                                    <option value="0">Male</option>
                                                    <option value="1">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_player" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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
<script>
var loadDemoImgFile = function(event,x) {
    var output = document.getElementById('output'+x);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
    }
};
</script>
@endsection