@extends('layout')
@section('title','Contact')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/more/contact_us.css')}}">
<!-- Content news -->
<div data-aos="fade-up" data-aos class="container" style="margin-top: 100px !important;">
    <div class="form_top">
        <h1 class="title_page">CONTACT US</h1>
        <p>Thanks for being a fan or customer of our products. We are committed to providing you with the highest quality products at affordable prices, and your support helps us create more. Please email us if you have any questions or need assistance with our products. We will reply within 24 hours on working days!</p>
        <p>Address: NO.20 Building 100 - PhanTu Street - DaNang city</p>
        <p>E-mail: support@DAVINCI.com</p>
        <p>Phone: 0779-253-494</p>
    </div>
    <div class="form_bottom">
        <form action="{{route('thankyou')}}" class="form_input">
            <input class="hj" type="text" placeholder="Name" required/>
            <input class="hj" type="text" placeholder="Email" required/>
            <textarea class="hj" type="text" placeholder="Message" style="height: 150px;" required></textarea>
            <input id="submit_btn" class="hj sub" type="submit" placeholder="Submit" value="Sent">
        </form>
    </div>
</div>
<!-- End content news -->
<script src="{{asset('public/client/js/custom/pages/shop/product_detail.js')}}"></script>
@endsection