@extends('admin.layout')
@section('title', 'Update Product')
@section('head_icon', 'edit')
@section('heading', 'Update Product')
@section('admin_content')

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                @foreach($edit_product as $key => $pro)
                                <form action="{{URL('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="product_name" value="{{$pro->product_name}}" type="text" class="form-control" placeholder="Product Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,1)">
                                                    @if($pro->product_image == null)
                                                        <img id="output1" style="max-width:50px">
                                                    @else
                                                        <img id="output1" src="{{URL('public/uploads/product/'.$pro->product_image)}}" alt="{{$pro->product_name}}" style="max-width:50px">
                                                    @endif
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image1" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,2)">
                                                    @if($pro->product_image1 == null)
                                                        <img id="output2" style="max-width:50px">
                                                    @else
                                                        <img id="output2" src="{{URL('public/uploads/product/'.$pro->product_image1)}}" alt="{{$pro->product_name}}" style="max-width:50px">
                                                    @endif
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="product_image2" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadDemoImgFile(event,3)">
                                                    @if($pro->product_image2 == null)
                                                        <img id="output3" style="max-width:50px">
                                                    @else
                                                        <img id="output3" src="{{URL('public/uploads/product/'.$pro->product_image2)}}" alt="{{$pro->product_name}}" style="max-width:50px">
                                                    @endif
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="product_price" value="{{$pro->product_price}}" type="text" class="form-control" placeholder="Price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">assessment</i>
                                                    </span>
                                                    <input name="product_parameters" value="{{$pro->product_parameters}}" type="text" class="form-control" placeholder="Product Parameters">
                                                </div>
                                                <select name="product_cate" class="form-control pro-edt-select form-control-primary">
                                                    <option value="">Choose product category</option>
                                                    @foreach($cate_product as $key => $cate)
                                                        @if($cate->category_id==$pro->category_id)
                                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                        @else
                                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea name="product_desc" row="3" type="text" class="form-control" placeholder="Product Description">{{$pro->product_desc}}</textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">edit_note</i>
                                                    </span>
                                                    <textarea name="product_content" row="3" type="text" class="form-control" placeholder="Product Content">{{$pro->product_content}}</textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">info</i>
                                                    </span>
                                                    <textarea name="product_details" row="3" type="text" class="form-control" placeholder="Product Details">{{$pro->product_details}}</textarea>
                                                </div>
                                                <select name="product_status" class="form-control pro-edt-select form-control-primary">
                                                    @if($pro->product_status == 1)
                                                        <option value="1" selected>Stocking</option>
                                                        <option value="0">Out of stock</option>
                                                    @else
                                                        <option value="1">Stocking</option>
                                                        <option value="0" selected>Out of stock</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="update_product" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Update
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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