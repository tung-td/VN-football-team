@extends('layout')

@foreach($category_name as $key => $name)
@section('title',$name->category_name)
@endforeach

@section('content')
<!-- Toast -->
<div id="toast"></div>

<div class="container" style="min-height: 750px">
    <div class="bg-white rounded d-flex align-items-center justify-content-between" id="header-container">
        <nav class="navbar navbar-expand-lg navbar-light pl-lg-0 pl-auto"> <button class="navbar-toggler" id="icon"> <span
                    class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav d-lg-flex align-items-lg-center">
                    <li class="nav-item active"> <select name="sort" id="sort">
                            <option value="" hidden selected>Sort by</option>
                            <option value="price">Price</option>
                            <option value="popularity">Popularity</option>
                            <option value="rating">Rating</option>
                        </select> </li>
                    <li class="nav-item d-inline-flex align-items-center justify-content-between mb-lg-0 mb-3">
                        <div class="d-inline-flex align-items-center mx-lg-2" id="select2">
                            <div class="pl-2">Products:</div> <select name="pro" id="pro">
                                <option value="18">16</option>
                                <option value="19">24</option>
                                <option value="20">36</option>
                            </select>
                        </div>
                        <div class="font-weight-bold mx-2 result">16 from 200</div>
                    </li>
                    <li class="nav-item d-lg-none d-inline-flex"> </li>
                </ul>
            </div>
        </nav>
        <div class="ml-auto mt-3 mr-2">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true" class="font-weight-bold">&lt;</span> <span class="sr-only">Previous</span> </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">..</a></li>
                    <li class="page-item"><a class="page-link" href="#">24</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true" class="font-weight-bold">&gt;</span> <span class="sr-only">Next</span> </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="content" class="my-5">
        <div id="filterbar" class="collapse">
            <div class="box border-bottom">
                <div class="form-group text-center">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-success form-check-label">
                            <input class="form-check-input" type="radio"> Reset </label>
                        <label class="btn btn-success form-check-label active"> <input class="form-check-input"
                                type="radio" checked> Apply </label>
                    </div>
                </div>
                <div> <label class="tick">New <input type="checkbox" checked="checked"> <span class="check"></span>
                    </label> </div>
                <div> <label class="tick">Sale <input type="checkbox"> <span class="check"></span> </label> </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">FEATURED DEPARTMENTS</div>
                <div id="inner-box" class="mt-2 mr-1 show">
                    <div class="my-1"> <label class="tick">Face cover <input type="checkbox" checked="checked">
                            <span class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Scarves <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Training <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Sale items <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Jacket <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Footwear <input type="checkbox" checked> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Headwear <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Premium gifts <input type="checkbox" checked> <span
                                class="check"></span> </label> </div>
                </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">Kits type</div>
                <div id="inner-box2" class="mt-2 mr-1 show">
                    <div class="my-1"> <label class="tick">Home <input type="checkbox" checked="checked"> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Away <input type="checkbox"> <span class="check"></span>
                        </label> </div>
                    <div class="my-1"> <label class="tick">Third <input type="checkbox" checked> <span
                                class="check"></span> </label> </div>
                    <div class="my-1"> <label class="tick">Goal keeper <input type="checkbox"> <span
                                class="check"></span> </label> </div>
                </div>
            </div>
            <div class="box border-bottom">
                <div class="box-label text-uppercase d-flex align-items-center">Price </div>
                <div class="show" id="price">
                    <div class="middle">
                        <div class="multi-range-slider"> <input type="range" id="input-left" min="0" max="100" value="10"> <input type="range" id="input-right" min="0" max="100" value="50">
                            <div class="slider-price">
                                <div class="track"></div>
                                <div class="range"></div>
                                <div class="thumb left"></div>
                                <div class="thumb right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <div> <span id="amount-left" class="font-weight-bold"></span> $10.00 </div>
                        <div> <span id="amount-right" class="font-weight-bold"></span> $500.00 </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-label text-uppercase d-flex align-items-center">Size</div>
                <div id="size" class="show">
                    <div class="btn-group d-flex align-items-center flex-wrap" data-toggle="buttons"> <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                type="checkbox"> S </label> <label class="btn btn-success form-check-label"> <input
                                class="form-check-input" type="checkbox" checked> M </label> <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                type="checkbox" checked> L </label> <label class="btn btn-success form-check-label">
                            <input class="form-check-input" type="checkbox" checked> XL </label> <label class="btn btn-success form-check-label"> <input class="form-check-input"
                                type="checkbox" checked> XXL </label>
                    </div>
                </div>
            </div>
        </div>
        <div id="products">
            <div class="row mx-0">
                @foreach($category_name as $key => $name)
                <div class="row">
                    @foreach($list_product as $key => $product)
                        @if($product->category_id==$name->category_id)
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <!-- <form> -->
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                <div class="product-image">
                                    <a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}" class="image">
                                        <img class="pic-1" src="{{URL('public/uploads/product/'.$product->product_image)}}">
                                        <img class="pic-2" src="{{URL('public/uploads/product/'.$product->product_image1)}}">
                                    </a>
                                    <ul class="product-links">
                                        <li><button onclick="showSuccessCartToast('add_to_cart','{{$product->product_name}}',1)" type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" style="border-radius: 50px;;">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button></li>
                                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}"><i
                                                    class="fa fa-search"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h3>
                                    <div class="price">{{number_format($product->product_price,0,',','.')}} VNĐ</div>
                                </div>
                                <!-- end form -->
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection