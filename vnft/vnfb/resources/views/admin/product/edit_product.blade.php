@extends('admin.layout')
@section('admin_content')

<!-- Single pro tab start-->
<!-- <div class="single-product-tab-area mg-b-30">
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
                                                    <input name="product_image" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadFile(event,1)">
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
                                                    <input name="product_image1" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadFile(event,2)">
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
                                                    <input name="product_image2" type="file" class="form-control" placeholder="Product Image" accept="image/*" onchange="loadFile(event,3)">
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
                                                    <input name="product_price" type="text" class="form-control" placeholder="Price">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
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
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea name="product_desc" row="3" type="text" class="form-control" placeholder="Product Description"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">edit_note</i>
                                                    </span>
                                                    <textarea name="product_content" row="3" type="text" class="form-control" placeholder="Product Content"></textarea>
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons" aria-hidden="true">info</i>
                                                    </span>
                                                    <textarea name="product_details" row="3" type="text" class="form-control" placeholder="Product Details"></textarea>
                                                </div>
                                                <select name="product_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Stocking</option>
                                                    <option value="0">Out of stock</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_product" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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
var loadFile = function(event,x) {
    var output = document.getElementById('output'+x);
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
    URL.revokeObjectURL(output.src) // free memory
    }
};
</script> -->


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="container card-body">
        @foreach($edit_product as $key => $pro)
        <form action="{{URL('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="product_name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{$pro->product_name}}" placeholder="Tên sản phẩm...">
            </div>

            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="product_image" name="product_image">
                <img src="{{URL('public/uploads/product/'.$pro->product_image)}}" alt="{{$pro->product_name}}" width="100" height="100">
            </div>
            
            <div class="form-group">
                <label for="product_image">Product Image 1</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="product_image1" name="product_image1">
                <img src="{{URL('public/uploads/product/'.$pro->product_image1)}}" alt="{{$pro->product_name}}" width="100" height="100">
            </div>
            
            <div class="form-group">
                <label for="product_image">Product Image 2</label>
                <input style="padding: .2rem .75rem;" type="file" class="form-control" id="product_image2" name="product_image2">
                <img src="{{URL('public/uploads/product/'.$pro->product_image2)}}" alt="{{$pro->product_name}}" width="100" height="100">
            </div>

            <div class="form-group">
                <label for="product_cate">Danh mục sản phẩm</label>
                <select id="product_cate" name="product_cate" class="form-control form-control-sm">
                @foreach($cate_product as $key => $cate)
                    @if($cate->category_id==$pro->category_id)
                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @else
                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                    @endif
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_price">Giá sản phẩm</label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="{{$pro->product_price}}" placeholder="Giá sản phẩm...">
            </div>
            <div class="form-group">
                <label for="product_desc">Mô tả sản phẩm</label>
                <textarea style="resize: none;" class="form-control" id="product_desc" name="product_desc" rows="3" placeholder="Mô tả sản phẩm...">{{$pro->product_desc}}</textarea>
            </div>
            <div class="form-group">
                <label for="product_parameters">Thông số</label>
                <input type="text" class="form-control" id="product_parameters" name="product_parameters" value="{{$pro->product_parameters}}" placeholder="Thông số...">
            </div>
            <div class="form-group">
                <!-- <label for="product_content">Đặc điểm sản phẩm</label> -->
                <textarea style="resize: none;" class="form-control" id="product_content" name="product_content" rows="3">{{$pro->product_content}}</textarea>
            </div>
            <div class="form-group">
                <!-- <label for="product_details">Chi tiết sản phẩm</label> -->
                <textarea style="resize: none;" class="form-control" id="product_details" name="product_details" rows="3">{{$pro->product_details}}</textarea>
            </div>
            <button type="submit" name="add_product" class="btn btn-primary">Cập nhật sản phẩm</button>
        </form>
        @endforeach
    </div>
</div>
<!-- Success Modal-->
@endsection