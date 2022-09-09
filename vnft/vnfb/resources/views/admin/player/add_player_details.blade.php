@extends('admin.layout')
@section('title', 'Add Player Details')
@section('head_icon', 'settings_accessibility')
@section('heading', 'Add Player Details')
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
                                <form action="{{URL('/save-player-details')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select name="player_id" class="form-control pro-edt-select form-control-primary">
                                                    <option value="">Choose Player</option>
                                                    @foreach($list_player as $key => $player)
                                                        <option value="{{$player->player_id}}">{{$player->player_name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="img" type="file" class="form-control" placeholder="Player Image" accept="image/*" onchange="loadDemoImgFile(event,1)">
                                                    <img id="output1" style="max-width:50px">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="appearance" type="text" class="form-control" placeholder="Appearance">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="total_goals" type="text" class="form-control" placeholder="Total Goals">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="trophies" type="text" class="form-control" placeholder="Trophies">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="bio" type="text" class="form-control" placeholder="Biography">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="joined" type="text" class="form-control" placeholder="Joined Year">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="first_match" type="date" class="form-control" placeholder="First Match">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="first_concurrent" type="text" class="form-control" placeholder="First Concurrent">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="quote" type="text" class="form-control" placeholder="Quote">
                                                </div>
                                                
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="all_appearance" type="text" class="form-control" placeholder="All Appearance">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="all_total_goals" type="text" class="form-control" placeholder="All Total Goals">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="all_trophies" type="text" class="form-control" placeholder="All Trophies">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_player_details" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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