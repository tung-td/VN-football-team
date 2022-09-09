@extends('layout')
@section('title','Thankyou')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/more/contact_us.css')}}">
<div data-aos="fade-up" data-aos class="container tk" style="margin-top: 100px !important;">
    <div class="form_top">
        <h1 class="title_page">THANK YOU!</h1>
        <img class="img_done" src="{{asset('public/client/img\custom/img/tick_done.png')}}" alt=""> 
    </div>
    <div class="form_bottom tks">
        <div class="list_cs">
            <h4>A Gift For You</h4>
            <p>Enter coupon code #3RDTXVG12 next time to get 10% off</p>
                <button onclick="window.location='{{route('home')}}'" class="hj sub"> TAKE 10% Off Now</button>
        </div>
    </div>
</div>
<script src="{{asset('public/client/js/custom/pages/shop/product_detail.js')}}"></script>
@endsection