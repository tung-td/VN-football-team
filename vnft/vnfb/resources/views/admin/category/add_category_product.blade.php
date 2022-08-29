@extends('admin.layout')
@section('title', 'Add Product Category')
@section('head_icon', 'category')
@section('heading', 'Add Product Category')
@section('admin_content')
<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
<p class="mb-4"></p> -->

<!-- DataTales Example -->
<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm</h6>
    </div>
    <div class="container card-body">
        <form action="{{URL('/save-category-product')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="category_product_name">Tên danh mục</label>
                <input type="text" class="form-control" id="category_product_name" name="category_product_name" placeholder="Tên danh mục...">
            </div>
            <div class="form-group">
                <label for="category_product_desc">Mô tả danh mục</label>
                <textarea style="resize: none;" class="form-control" id="category_product_desc" name="category_product_desc" rows="3" placeholder="Mô tả danh mục..."></textarea>
            </div>
            <div class="form-group">
                <label for="created_at">Thời gian thêm</label>
                <input type="date" class="form-control" id="created_at" name="created_at" placeholder="Thời gian thêm danh mục...">
            </div>
            <div class="form-group">
                <label for="category_product_status">Tình trạng</label>
                <select id="category_product_status" name="category_product_status" class="form-control form-control-sm">
                    <option value="1">Hiển thị</option>
                    <option value="0">Ẩn</option>
                </select>
            </div>
            <button type="submit" name="add_category_product" class="btn btn-grape">Thêm danh mục</button>
        </form>
    </div>
</div> -->
<!-- Success Modal-->

<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="review-tab-pro-inner">
                        <!-- <ul id="myTab3" class="tab-review-design">
                            <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i>Add Product Category</a></li>
                        </ul> -->
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <form action="{{URL('/save-category-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="category_product_name" type="text" class="form-control" placeholder="Category Product Name">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea name="category_product_desc" row="3" type="text" class="form-control" placeholder="Category Product Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">date_range</i>
                                                    </span>
                                                    <input name="created_at" type="date" class="form-control" placeholder="Add time">
                                                </div>
                                                <select name="category_product_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Show</option>
                                                    <option value="0">Hide</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="text-center custom-pro-edt-ds">
                                                <button name="add_category_product" type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Add
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