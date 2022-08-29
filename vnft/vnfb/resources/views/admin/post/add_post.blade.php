@extends('admin.layout')
@section('title', 'Add News')
@section('head_icon', 'inventory')
@section('heading', 'Add News')
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
                                <form action="{{URL('/save-post')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-user" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">drive_file_rename_outline</i>
                                                    </span>
                                                    <input name="post_title" type="text" class="form-control" placeholder="Title">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-edit" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">add_photo_alternate</i>
                                                    </span>
                                                    <input name="post_thumbnail" type="file" class="form-control" placeholder="Thumbnail">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="fa fa-usd" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">request_quote</i>
                                                    </span>
                                                    <input name="post_meta_desc" type="text" class="form-control" placeholder="Meta SEO description">
                                                </div>
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-new-file" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">assessment</i>
                                                    </span>
                                                    <input name="post_meta_keywords" type="text" class="form-control" placeholder="Meta SEO keywords">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <select name="cate_post_id" class="form-control pro-edt-select form-control-primary">
                                                    @foreach($cate_post as $key => $cate)
                                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                                    @endforeach
                                                </select>
                                                <select name="post_status" class="form-control pro-edt-select form-control-primary">
                                                    <option value="1">Public</option>
                                                    <option value="0">Private</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="custom-pro-edt-ds">
                                                <div class="input-group mg-b-pro-edt">
                                                    <span class="input-group-addon">
                                                        <!-- <i class="icon nalika-favorites" aria-hidden="true"></i> -->
                                                        <i class="material-icons" aria-hidden="true">description</i>
                                                    </span>
                                                    <textarea id="editor1" name="post_content" row="8" type="text" class="form-control" placeholder="Product Description"></textarea>
                                                </div>
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



<!-- CKEditor/CKFinder-->
<script src="{{asset('public/ckeditor1/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>

@endsection