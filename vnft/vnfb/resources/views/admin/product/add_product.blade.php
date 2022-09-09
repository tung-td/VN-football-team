@extends('admin.layout')
@section('title', 'Add Product')
@section('head_icon', 'newspaper')
@section('heading', 'Add Product')
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
                                <form action="{{URL('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="product_name" type="text" class="form-control" placeholder="Product Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,1)">
                                                    <img id="output1" style="max-width:50px">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image1" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,2)">
                                                    <img id="output2" style="max-width:50px">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image2" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,3)">
                                                    <img id="output3" style="max-width:50px">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="fa fa-usd" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="product_price" type="text" class="form-control" placeholder="Price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-new-file" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">assessment</i>
                                                    </span>
                                                    <input name="product_parameters" type="text" class="form-control" placeholder="Product Parameters">
                                                </div>
                                                <select name="product_cate" class="form-control pro-edt-select form-control-primary">
                                                    <option value="">Choose product category</option>
                                                    @foreach($cate_product as $key => $cate)
                                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea name="product_desc" row="3" type="text" class="form-control" placeholder="Product Description"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">edit_note</i>
                                                    </span>
                                                    <textarea name="product_content" row="3" type="text" class="form-control" placeholder="Product Content"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">info</i>
                                                    </span>
                                                    <textarea name="product_details" row="3" type="text" class="form-control" placeholder="Product Details"></textarea>
                                                </div>
                                                <select name="product_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Stocking</option>
                                                    <option value="0">Out of stock</option>
                                                </select>
                                                <!-- tag select2 -->
                                                <select class="form-control select2" multiple="multiple"></select>
                                                <script>
                                                    $(function () {
                                                        $(".select2").select2({
                                                            tags: true,
                                                            tokenSeparators: [',', ' ']
                                                        });
                                                    });
                                                </script>

<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<select id="appbundle_items_accountdebet" name="appbundle_items[accountdebet]" class="js-example-basic-single"><option value="1">001 - Środki trwałe x</option><option value="2">001-001 - Środek trwały 1 </option><option value="3">001-002 - Środek trwały 2 </option><option value="4">002 - Kasa</option><option value="7">04-33 - test</option><option value="10">05 - dff</option></select>

<script>
    $(document).ready(function() {
    $(".js-example-basic-single").select2();
});
</script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_product" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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