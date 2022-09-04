@extends('admin.layout')
@section('title', 'Add Match')
@section('head_icon', 'newspaper')
@section('heading', 'Add Match')
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
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Match</a></li>
                        </ul> -->
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form action="{{URL('/save-match')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select id="tournament" name="tournament" class="form-control pro-edt-select form-control-primary">
                                                    <option value=""> --- Select Tournament --- </option>
                                                    @foreach($tournaments as $key => $tournament)
                                                        <option value="{{$tournament->id}}">{{$tournament->tournament_name}}</option>
                                                    @endforeach
                                                </select>
                                                <select id="squad" class="form-control pro-edt-select form-control-primary select-team-in-squad" name="squad">
                                                    <option value=""> --- Select Squad --- </option>
                                                    <option value="1">Men</option>
                                                    <option value="2">Women</option>
                                                    <option value="3">Youngs</option>
                                                    <option value="4">Legends</option>
                                                </select>
                                                <select id="teamA" class="form-control pro-edt-select form-control-primary select-team-in-squad" name="teamA">
                                                    <option value=""> --- Select Team A --- </option>
                                                </select>
                                                <select id="teamB" class="form-control pro-edt-select form-control-primary" name="teamB">
                                                    <option value=""> --- Select Team B --- </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">stadium</i>
                                                    </span>
                                                    <input name="stadium" type="text" class="form-control" placeholder="Stadium">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="stadium_background" type="file" class="form-control" placeholder="Stadium Background" accept="image/*" onchange="loadDemoImgFile(event,1)">
                                                    <img id="output1" style="max-width:50px">
                                                </div>
                                                <select name="ticket" class="form-control pro-edt-select form-control-primary">
                                                    <option value="0" selected>No ticket sales</option>
                                                    <option value="1">Tickets sales</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_match" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".select-team-in-squad").change(function(){
            var action = $(this).attr('id');
            var squad = $("#squad").val();
            var teamA = $("#teamA").val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action == 'squad') {
                result = 'teamA';
            } else {
                result = 'teamB';
            };

            $.ajax({
                url : '{{url('/showTeaminSquad')}}',
                method: 'POST',
                data:{action:action, squad:squad, teamA:teamA, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
        // <div id="hehe" class="team">oke</div>
    });
</script>
@endsection