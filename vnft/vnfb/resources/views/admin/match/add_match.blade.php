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
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="match_name" type="text" class="form-control" placeholder="Match Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="match_image2" type="file" class="form-control" placeholder="Match Image" accept="image/*" onchange="loadDemoImgFile(event,3)">
                                                    <img id="output3" style="max-width:50px">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="fa fa-usd" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="match_price" type="text" class="form-control" placeholder="Price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-new-file" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">assessment</i>
                                                    </span>
                                                    <input name="match_parameters" type="text" class="form-control" placeholder="Match Parameters">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea name="match_desc" row="3" type="text" class="form-control" placeholder="Match Description"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">edit_note</i>
                                                    </span>
                                                    <textarea name="match_content" row="3" type="text" class="form-control" placeholder="Match Content"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">info</i>
                                                    </span>
                                                    <textarea name="match_details" row="3" type="text" class="form-control" placeholder="Match Details"></textarea>
                                                </div>
                                                <select name="match_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Stocking</option>
                                                    <option value="0">Out of stock</option>
                                                </select>
                                                <!-- <select class="form-control pro-edt-select form-control-primary" name="squad">
                                                    <option value="">---</option>
                                                    <option value="1">Men</option>
                                                    <option value="2">Women</option>
                                                    <option value="3">Youngs</option>
                                                    <option value="4">Legends</option>
                                                </select>
                                                <select class="form-control pro-edt-select form-control-primary" name="team">
                                                </select> -->
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
                                <form action="" method="">
                                    @csrf
                                    <select class="form-control pro-edt-select form-control-primary" name="squad">
                                        <option value="">---</option>
                                        <option value="1">Men</option>
                                        <option value="2">Women</option>
                                        <option value="3">Youngs</option>
                                        <option value="4">Legends</option>
                                    </select>
                                    <select class="form-control pro-edt-select form-control-primary" name="team">
                                    </select>
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

<script type="text/javascript">
    var url = "{{ route('team.select') }}";
    $("select[name='squad']").change(function(){
        var squad = $(this).val();
        var token = $("input[name='_token']").val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                squad: squad,
                _token: token
            },
            success: function(data) {
                $("select[name='team'").html('');
                $.each(data, function(key, value){
                    $("select[name='team']").append(
                        "<option value=" + value.id + ">" + value.name + "</option>"
                    );
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data); 
                }
            });
        });
    })   
        
</script>
@endsection