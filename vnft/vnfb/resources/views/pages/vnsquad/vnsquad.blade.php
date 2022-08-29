@extends('layout')
@section('title','VN Squad')
@section('content')
<!-- Start Slider-->
<div class="slider_my-utd">
    <h1 class="my-utd_text_heading">MEET THE SQUADS</h1>
</div>
<!-- End Slider -->

<!-- Start Content -->
<div class="content_my-utd">
    <div class="my-row player-list">
        <div class="my-team man my-col my-col-full">
            <div class="my-heading">
                <h2>First Team Men</h2>
                <button class="my-btn"> <a href="{{URL('/squad/1')}}">DISCOVERY MORE</a></button>
            </div>
        </div>
    </div>

    <div class="my-row player-list">
        <div class="my-team woman  my-col my-col-full">
            <div class="my-heading">
                <h2>First Team Women</h2>
                <button class="my-btn"> <a href="{{URL('/squad/2')}}">DISCOVERY MORE</a></button>
            </div>
        </div>
    </div>

    <div class="my-row player-list">
        <div class="my-team youngs  my-col my-col-full">
            <div class="my-heading">
                <h2>Young team</h2>
                <button class="my-btn"> <a href="{{URL('/squad/3')}}">DISCOVERY MORE</a></button>
            </div>
        </div>
    </div>

    <div class="my-row player-list">
        <div class="my-team legends  my-col my-col-full">
            <div class="my-heading">
                <h2>Legends</h2>
                <button class="my-btn"> <a href="{{URL('/squad/4')}}">DISCOVERY MORE</a></button>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection