@extends('layout')

@foreach($product_details as $key =>$value)
@section('title',$value->product_name)
@endforeach

@section('content')
<!-- Toast -->
<div id="toast"></div>

<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/shop/product_detail.css')}}">
<!-- Product guide -->
<div class="guide">
    @foreach($product_details as $key =>$value)
        @foreach($category as $key => $cate)
            @if($value->category_id == $cate->category_id)
                <a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">
                    {{$cate->category_name}}
                </a>
            @endif
        @endforeach
        <a href="{{URL('chi-tiet-san-pham/'.$value->product_id)}}">/ {{$value->product_name}}</a>
        <a href="{{URL('chi-tiet-san-pham/'.$value->product_id)}}">/ Product ID: {{$value->product_id}}</a>
    @endforeach
</div>
<!-- End product guide -->
<hr>

<div id="content-wrapper">

    <div class="product_container">
            {{csrf_field()}}
            @foreach($product_details as $key =>$value)
            <!-- Image-->
            <div class="column_1">
                <div id="img-container">
                    <img id=featured src="{{URL('/public/uploads/product/'.$value->product_image)}}">
                </div>
                <div id="slide-wrapper">
                    <div id="slider">
                        <img class="thumbnail active" src="{{URL('/public/uploads/product/'.$value->product_image)}}">
                        <img class="thumbnail" src="{{URL('/public/uploads/product/'.$value->product_image1)}}">
                        <img class="thumbnail" src="{{URL('/public/uploads/product/'.$value->product_image2)}}">
                    </div>
                </div>
            </div>
            <!-- End image -->

            <!-- Cart information-->
            <div class="column_2">
                <h3>{{$value->product_name}}</h3>
                <h5 class="to_red">{{number_format($value->product_price,0,',','.')}} VNĐ</h5>
                <form action="{{route('cart.show')}}" method="">
                    <div class="product_cart">
                        <div class="size">Size</div>
                        <div class="stuff">
                            <div class="button" tabindex="1">
                                <h1>S</h1>
                            </div>
                            <div class="button" tabindex="2">
                                <h1>M</h1>
                            </div>
                            <div class="button" tabindex="3">
                                <h1>L</h1>
                            </div>
                            <div style="width: 60px;" class="button" tabindex="3">
                                <h1>XL</h1>
                            </div>
                            <div style="width: 70px;" class="button" tabindex="3">
                                <h1>XXL</h1>
                            </div>
                        </div>
                        <div class="buy_column">
                            <div class="quantity">
                                <div class="size">Quantity</div>
                                <div class="number_quantity">
                                    <select>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="buy_button">
                                @csrf
                                <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                                <!-- <input type="hidden" name="product_id_hidden" value="{{$value->product_id}}"> -->
                                <!-- <button type="submit" class="form-control btn btn-grape">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ hàng
                                </button> -->
                                <a onclick="showSuccessCartToast('add_to_cart','{{$value->product_name}}',1,'{{URL('/cart')}}')" id="add_to" href="#"><button type="button" class="buy-product form-control btn btn-grape add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                                    <i aria-hidden="true"></i> Add to cart </button></a>
                                <a id="buy_it" href="#"><button type="submit" class="buy-product form-control btn btn-grape add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
                                    <i aria-hidden="true"></i> Buy It Now </button></a>
                            </div>
                        </div>

                    </div>
                </form>
                <hr>
                <div class="shiping">
                    <div class="top_bt">
                        <h6 class="icon_product">
                            <!-- <i class="ti-truck"></i> -->
                            <i class="material-icons">local_shipping</i>
                             Shipping</h6> 
                        <button id="hide_sh" class="ff">
                            <!-- <i class="ti-arrow-circle-up"></i> -->
                            <i class="ti-arrow-circle-up material-icons">expand_less</i>
                        </button>
                        <button id="show_sh" style="display: none" class="ff">
                            <!-- <i class="ti-arrow-circle-down"></i> -->
                            <i class="ti-arrow-circle-down material-icons">expand_more</i>
                        </button>
                    </div>
                    <li id="shipping_button">This item usually ships within one business day. Please allow an extra 3 days for delivery of items with personalisation.</li>
                </div>
                <hr>
                <div class="detail_box">
                    <div class="top_bt">
                        <h6 class="icon_product">
                            <!-- <i class="ti-search"></i> -->
                            <i class="material-icons">info</i>
                             Details</h6>
                        <button id="hide_dt" class="ff">
                            <!-- <i class="ti-arrow-circle-up"></i> -->
                            <i class="ti-arrow-circle-up material-icons">expand_less</i>
                        </button>
                        <button id="show_dt" style="display: none" class="ff">
                            <!-- <i class="ti-arrow-circle-down"></i> -->
                            <i class="ti-arrow-circle-down material-icons">expand_more</i>
                        </button>
                    </div>
                    <!-- <ul id="detail_product">
                        <li>Product ID: 12052601</li>
                        <li>Inner back neck signoff</li>
                        <li>Devil signoff below back collar</li>
                        <li>Regular fit</li>
                        <li>Ribbed crewneck</li>
                        <li>100% recycled polyester piqué</li>
                        <li>Moisture absorbing</li>
                        <li>Ribbed cuffs</li>
                        <li>Grand Sport</li>
                    </ul> -->
                    <p id="detail_product">
                        {{$value->product_parameters}}
                    </p>
                </div>
                <hr>
                <div class="description">
                    <div class="top_bt">
                        <h6 class="icon_product">
                            <!-- <i class="ti-pencil-alt"></i> -->
                            <i class="material-icons">description</i>
                             Description</h6>
                        <button id="hide_de" style="display: none" class="ff">
                            <!-- <i class="ti-arrow-circle-up"></i> -->
                            <i class="ti-arrow-circle-up material-icons">expand_less</i>
                        </button>
                        <button id="show_de"  class="ff">
                            <!-- <i class="ti-arrow-circle-down"></i> -->
                            <i class="ti-arrow-circle-down material-icons">expand_more</i>
                        </button>
                    </div>
                    <div id="description_product" style="display: none;">
                        <p>
                            {{$value->product_desc}}
                        </p>
                    </div>
                </div>

            </div>
            <!-- End Cart information -->
            @endforeach
    </div>

    <!-- Recently & Also like -->
    <div id="products">
        <div class="row mx-0">
            <div class="row row_product">
                <div class="row_1">
                    <h3>Related Product</h3>
                    <button id="hide_re">
                        <i class="ti-angle-up"></i>
                    </button>
                    <button id="show_re" style="display: none">
                        <i class="ti-angle-down"></i>
                    </button>
                    <div class="recently" id="recently_button">
                        @php
                            $count=1
                        @endphp

                        @foreach($relate as $key => $product)

                        @if($count<=4)
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
                                        <li><button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" style="border-radius: 50px;;">
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
                                @php
                                    $count++
                                @endphp
                            </div>
                        </div>
                        @endif

                        @endforeach
                    </div>
                </div>
                <div class="row_2">
                    <h3>You may also like</h3>
                    <button id="hide_al">
                        <i class="ti-angle-up"></i>
                    </button>
                    <button id="show_al" style="display: none">
                        <i class="ti-angle-down"></i>
                    </button>
                    <div class="also_like" id="also_like_button">
                        @php
                            $count=1
                        @endphp

                        @foreach($list_product as $key => $product)

                        @if($count<=4)
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
                                        <li><button type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart" style="border-radius: 50px;;">
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
                                @php
                                    $count++
                                @endphp
                            </div>
                        </div>
                        @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Recently & Also like -->

    <div class="footer_product">
        <div class="footer_1">
            <h4>Customer service</h4>
            <a href="">Help</a>
            <a href="">Track Order</a>
            <a href="">Size Chart</a>
        </div>
        <div class="footer_2">
            <h4>Free Shopping</h4>
            <a href="">Safe Shopping</a>
            <a href="">Delivery & Shipping</a>
            <a href="">90-Day Returns</a>
        </div>
        <div class="footer_3">
            <h4>Information</h4>
            <a href="">My Account</a>
            <a href="">About Us</a>
        </div>
        <div class="footer_4">
            <p style="font-weight: 600">Stay updated on sales new items and more</p>
            <a href="{{route('client.login')}}" class="btl"><p>SIGN UP & SAVE 10%</p></a>
        </div>
    </div>

</div>
<script src="{{asset('public/client/js/custom/pages/shop/product_detail.js')}}"></script>
<!-- End product detail -->
@endsection