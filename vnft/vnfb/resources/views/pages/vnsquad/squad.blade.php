@extends('layout')
@section('title',$squad_name.' Squad')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/responsive-myUtd.css')}}">
<!-- Slider -->
<div class="slider-homepage" style="margin-bottom: 130px;">
    <!-- <div class=" position-relative " style="width: 100%; height:1000px;">
        <div class="d-flex " style="position: absolute; width: inherit; ">
            <div class="slider-previous ti-angle-left " style="top: 17rem ;"></div>
            <div class="slider-next ti-angle-right " style="top: 17rem ;"></div>
        </div>
        <div class="forSlickSlider single-item-slider " style="max-height: 700px !important;">
            @foreach($slider as $key => $slide)
            <div class="item ">
                <img src="{{url('public/uploads/slider/'.$slide->slider_image)}}" alt="{{$slide->slider_name}} ">
            </div>
            @endforeach
        </div>
    </div> -->
</div>
<div class="slider-homepage" style="margin: 57px 0px;">
    <!-- <div class=" position-relative ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $slider_level = $squad_id + 1;
                    $count = 0;
                @endphp
                @foreach($slider as $key => $slide)
                    @if($slide->slider_level == $slider_level)
                        @if($count == 0)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}" class="active"></li>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}"></li>
                        @endif
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
            </ol>
            <div class="carousel-inner">
                @php
                    $count = 0;
                @endphp
                @foreach($slider as $key => $slide)
                    @if($slide->slider_level == $slider_level)
                        @if($count == 0)
                            <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
                        @endif
                                <img src="{{url('public/uploads/slider/'.$slide->slider_image)}}" alt="{{$slide->slider_name}}" class="d-block w-100">
                            </div>
                        @php
                            $count++;
                        @endphp
                    @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div> -->
</div>

<!-- Start Content -->
<div class="content_first-team">
    <!-- Start first team -->
    <main id="first-team">
        <div class="roler">
            First team
        </div>
        <!--start Goalkeepers -->
        <div class="team-position">
            <div class="position-names">Goalkeepers</div>
            <div class="sub-position">
                @foreach($squad_by_id as $key => $player)
                    @if($player->player_status == '0' && $player->player_position == '1')
                        <div class="position-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                            <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                class="position-img ml-05 ml-15" style="">
                            <div class="position-info">
                                <div class="position-number">{{$player->player_shirt_num}}</div>
                                <div class="position-name">{{$player->player_name}}</div>
                            </div>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>
        </div>

        <!--end Goalkeepers -->


        <!--start Defenders -->
        <div class="team-position">
            <div class="position-names">Defenders</div>
            <div class="sub-position">
                @php
                    $count = 0;
                @endphp
                @foreach($squad_by_id as $key => $player)
                    @if($player->player_status == '0' && $player->player_position == '2')
                        <div class="position-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                            <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                class="position-img ml-05 ml-15" style="">
                            <div class="position-info">
                                <div class="position-number">{{$player->player_shirt_num}}</div>
                                <div class="position-name">{{$player->player_name}}</div>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                        @if($count>=3)
                            @break
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <!--end Defenders -->


        <!--start Midfielders -->
        <div class="team-position">
            <div class="position-names">Midfielders</div>
            <div class="sub-position">
                @php
                    $count = 0;
                @endphp
                @foreach($squad_by_id as $key => $player)
                    @if($player->player_status == '0' && $player->player_position == '3')
                        <div class="position-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                            <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                class="position-img ml-05 ml-15" style="">
                            <div class="position-info">
                                <div class="position-number">{{$player->player_shirt_num}}</div>
                                <div class="position-name">{{$player->player_name}}</div>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                        @if($count>=4)
                            @break
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <!--end Midfielders -->


        <!--start Forward -->
        <div class="team-position">
            <div class="position-names">Forwards</div>
            <div class="sub-position">
                @php
                    $count = 0;
                @endphp
                @foreach($squad_by_id as $key => $player)
                    @if($player->player_status == '0' && $player->player_position == '4')
                        <div class="position-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                            <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                class="position-img ml-05 ml-15" style="">
                            <div class="position-info">
                                <div class="position-number">{{$player->player_shirt_num}}</div>
                                <div class="position-name">{{$player->player_name}}</div>
                            </div>
                        </div>
                        @php
                            $count++;
                        @endphp
                        @if($count>=3)
                            @break
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
        <!--end Forward -->

    </main>
    <!-- End first team -->


    <!-- END Goalkeepers -->
    <main id="man-players">
        <div class="grey-wall">
            <div class="list-part">
                <div class="role">Players List</div>

                <div class="team-position">
                    <div class="position-names" style="color: #fff;">Goalkeepers</div>
                    <div class="sub-button">
                        <!-- 3 -->
                        @foreach($squad_by_id as $key => $player)
                            @if($player->player_position == '1')
                                <div class="player-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                                    <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                        class="position-img" style="">
                                    <div class="position-info">
                                        <div class="position-number">{{$player->player_shirt_num}}</div>
                                        <div class="position-name">{{$player->player_name}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- END Goalkeepers -->

        <!-- START DEFENDERS -->
        <div class="white-wall">
            <div class="list-part">
                <div class="team-position mt-2em">
                    <div class="position-names" style="color: #000;">Defenders</div>
                    <div class="sub-button">
                        <!-- 10 -->
                        @foreach($squad_by_id as $key => $player)
                            @if($player->player_position == '2')
                                <div class="player-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                                    <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                        class="position-img" style="">
                                    <div class="position-info">
                                        <div class="position-number">{{$player->player_shirt_num}}</div>
                                        <div class="position-name">{{$player->player_name}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- END DEFENDERS -->


        <!-- START MIDFIELDERS -->
        <div class="grey-wall">
            <div class="list-part">
                <div class="team-position pt-2em">
                    <div class="position-names" style="color: #fff;">Midfielders</div>
                    <div class="sub-button">
                        <!-- 8 -->
                        @foreach($squad_by_id as $key => $player)
                            @if($player->player_position == '3')
                                <div class="player-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                                    <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                        class="position-img" style="">
                                    <div class="position-info">
                                        <div class="position-number">{{$player->player_shirt_num}}</div>
                                        <div class="position-name">{{$player->player_name}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- END MIDFIELDERS -->


        <!-- START FORWARD -->
        <div class="white-wall">
            <div class="list-part">
                <div class="team-position mt-2em">
                    <div class="position-names" style="color: #000;">Forward</div>
                    <div class="sub-button">
                        <!-- 5 -->
                        @foreach($squad_by_id as $key => $player)
                            @if($player->player_position == '4')
                                <div class="player-btn" data-aos="flip-left" onclick="location.href=`{{URL('/player-details/'.$player->player_id)}}`" style="cursor:pointer;">
                                    <img src="{{URL('public/uploads/player/'.$player->player_image)}}" alt="{{$player->player_name}}"
                                        class="position-img" style="">
                                    <div class="position-info">
                                        <div class="position-number">{{$player->player_shirt_num}}</div>
                                        <div class="position-name">{{$player->player_name}}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- END FORWARD -->
    </main>
</div>
<!-- End Content -->
@endsection