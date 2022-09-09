@extends('layout')
@section('title','Cart')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/shop/collections.css')}}">
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/shop/product_detail.css')}}">
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/shop/cart.css')}}">

<!-- Body - Carts container -->
<div class="cart-container" style="margin-top: 100px !important;">
    <div class="container">
        <div class="title-cart">
            <h1>
                Your Cart
                <!-- <i class="ti-shopping-cart"></i> -->
                <i class="material-icons-outlined">shopping_cart</i>
            </h1>
            <h5 style="color: red; font-size: 14px;">
                <?php
                use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </h5>
        </div>
        <hr>
        <div class="row align-items-start">
            <div class="col-4 product-title">
                Product Name
            </div>
            <div class="col-1 quantity-title">
                Quantity
            </div>
            <div class="col-1 subtotal-title">
                Price
            </div>
            <div class="col-1 discount-title">
                Subtotal
            </div>
            <div class="col-1">
                @if(Session::get('cart') == true)
                <button onclick="location.href='{{url('/del-all-pro')}}';" id="clear-cart">
                    Clear Cart
                </button>
                @endif
            </div>
        </div>
        <hr>

        @if(Session::get('cart') == true)
            @php
                $total = 0;
            @endphp

            <form class="row align-items-center" id="cartForm" action="{{url('/update-cart')}}" method="post">
                @csrf

                @foreach(Session::get('cart') as $key => $cart)
                    @php
                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                        $total += $subtotal;
                    @endphp
                    <div class="row align-items-center">
                        <div class="col-4">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">
                                <img src="{{asset('/public/uploads/product/'.$cart['product_image'])}}" class="rounded img-thumbnail" alt="{{$cart['product_name']}}">
                                <p>{{$cart['product_name']}}</p>
                            </a>

                        </div>
                        <div class="col-1">
                            <div class="number_quantity">
                                <input class="form-control-1" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                            </div>
                        </div>
                        <div class="col-1 mr-1">
                            {{number_format($cart['product_price'],0,',','.')}} VNĐ
                        </div>
                        <div class="col-1 mr-1">
                            {{number_format($subtotal, 0, ',', '.')}} VNĐ
                        </div>
                        <div class="col-1 trash-button">
                            <!-- <button class="trash" onclick="location.href='{{url('/del-product/'.$cart['session_id'])}}'">
                                <i class="ti-trash"></i>
                                <i class="material-icons">delete_forever</i>
                            </button> -->
                            <a class="trash" href="{{url('/del-product/'.$cart['session_id'])}}">
                                <!-- <i class="ti-trash"></i> -->
                                <i class="material-icons">delete_forever</i>
                            </a>
                        </div>

                        <hr>

                    </div>
                @endforeach
            
            </form>
        @else
            <div class="row align-items-center">
                Your cart is empty
            </div>
        @endif

        @if(Session::get('cart') == true)
        <div class="row align-items-end">
            <div class="coupon-form">
                <div class="btn-discount">
                <form action="{{url('/check-coupon')}}" method="post">
                    @csrf
                    <div class="col-3 cs-3">
                        <input name="coupon" class="form-control" type="text" placeholder="# Coupon Code" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập mã giảm giá!">
                    </div>
                    <button type="submit" class="col-1 cs-1 ip">
                        Apply Coupon
                    </button>
                </form>
                <div class="discount">
                @if (Session::get('coupon'))
                    @foreach (Session::get('coupon') as $key => $cou)
                        <strong> Using coupon: <span class="text-danger">{{$cou['coupon_code']}}</span></strong>
                        <a class="col-1 cs-1 ip" href="{{url('/unset-coupon')}}">Delete coupon</a>
                    @endforeach
                @endif
                </div>
                </div>
            </div>
            <div class="block-subtotal">
                <div class="subtotal">Subtotal: {{number_format($total, 0, ',', '.')}} VNĐ</div>
                @if (Session::get('coupon'))
                    @foreach (Session::get('coupon') as $key => $cou)
                        @if ($cou['coupon_condition']== 1)
                            <div class="subtotal">
                                @php
                                    $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                                    $total_coupon = $total - $subtotal_coupon;
                                @endphp
                                Discount {{$cou['coupon_number']}}%: {{number_format($subtotal_coupon, 0, ',', '.')}} VNĐ
                            </div>
                        @else
                            <div class="subtotal">
                                @php
                                    $total_coupon = ($total - $cou['coupon_number']);
                                @endphp
                                Discount: {{number_format($cou['coupon_number'], 0, ',', '.')}} VNĐ
                            </div>
                        @endif
                    @endforeach
                @endif

                @if (Session::get('coupon'))
                    <div class="subtotal">Total payment: {{number_format($total_coupon, 0, ',', '.')}} VNĐ </div>
                @else
                    <div class="subtotal">Total payment: {{number_format($total, 0, ',', '.')}} VNĐ </div>
                @endif
            </div>
        </div>
        @endif

        <hr>

        <div class="row submit-button">
            <div class="col-5 hd-5">
                <a href="{{route('product.show')}}" class="col-1 cs-1" id="back-shop">
                    <!-- <i class="ti-arrow-circle-left bc-1"></i> -->
                    <i class="material-icons-outlined">arrow_circle_left</i>
                    Back to Shopping
                </a>
            </div>
            @if(Session::get('cart') == true)
                <div class="col-2 cs-2">

                    <div class="col-1 hd-1">
                        <button type="submit" form="cartForm" name="update_qty" class="col-1 cs-1" id="update-cart">
                            Update Cart
                            <!-- <i class="ti-reload bc-2"></i> -->
                            <i class="material-icons">loop</i>
                        </button>
                    </div>

                    <div class="col-1 hd-1">
                        <a class="col-1 cs-1" id="checkout-cart" href="{{route('checkout')}}">
                            Checkout
                            <!-- <i class="ti-shopping-cart bc-2"></i> -->
                            <i class="material-icons">shopping_cart_checkout</i>
                        </a>
                    </div>
                    
                </div>
            @endif
        </div>
    </div>
</div>

<!-- End Body - cart container -->

<script src="{{asset('public/client/js/custom/pages/shop/product_detail.js')}}"></script>
<script src="{{asset('public/client/js/custom/pages/shop/demo.js')}}"></script>
<script src="{{asset('public/client/js/custom/pages/shop/cart.js')}}"></script>
@endsection