@extends('admin.layout')
@section('title', 'Add Match')
@section('head_icon', 'newspaper')
@section('heading', 'Add Match')
@section('admin_content')
<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 17px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 13px;
  width: 13px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #24caa1;
}

input:focus + .slider {
  box-shadow: 0 0 1px #24caa1;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 17px;
}

.slider.round:before {
  border-radius: 50%;
}

/* ADD TICKET PRICE */
.add-ticket-price {
    display: none;
}
</style>
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
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">event</i>
                                                    </span>
                                                    <input name="datetime" type="datetime-local" class="form-control" placeholder="datetime">
                                                </div>
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
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">merge_type</i>
                                                    </span>
                                                    <input name="type" type="text" class="form-control" placeholder="Type">
                                                </div>
                                                <select id="addTicketPrice" name="ticket" class="form-control pro-edt-select form-control-primary">
                                                    <option value="0" selected>No ticket sales</option>
                                                    <option value="1">Tickets sales</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="add-ticket-price">
                                    <div class="row add-ticket-price">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <h4 style="color: white">Ticket Price</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <label class="switch">
                                                    <input id="setDefaultPrice" type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                                 <span style="color: white">Default Price</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row add-ticket-price">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">class</i>
                                                    </span>
                                                    <input id="class1" name="class1" type="text" class="form-control" placeholder="Class 1st ticket price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">class</i>
                                                    </span>
                                                    <input id="class2" name="class2" type="text" class="form-control" placeholder="Class 2nd ticket price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">class</i>
                                                    </span>
                                                    <input id="class3" name="class3" type="text" class="form-control" placeholder="Class 3rd ticket price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons-outlined" aria-hidden="true">class</i>
                                                    </span>
                                                    <input id="class4" name="class4" type="text" class="form-control" placeholder="Class 4th ticket price">
                                                </div>
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

<!-- expand ticket price -->
<script>
$('#addTicketPrice').on('change', function() {
  if( this.value == 1) {
    $('.add-ticket-price').css('display', 'block');
  } else {
    $('.add-ticket-price').css('display', 'none');
  }
});
</script>

<!-- set default value price ticket -->
<script>
$('#setDefaultPrice').on('change', function() {
    if(this.checked) {
        $("#class1").val("500000");
        $("#class2").val("700000");
        $("#class3").val("900000");
        $("#class4").val("1200000");
    } else {
        $("#class1").val("");
        $("#class2").val("");
        $("#class3").val("");
        $("#class4").val("");
    }
});
</script>
@endsection