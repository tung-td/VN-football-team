@extends('layout')
@section('title','Player')
@section('content')
<?php
    use Carbon\Carbon;
?>
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/myutd/player-detail.css')}}">
        <!-- START CONTENT -->
        <div class="content-player" style="margin-top: 40px">
            <!-- PLAYER DETAIL -->
            <div class="player" style="font-weight: 500; ">
                <div class="player-image-bg">
                    <div class="player-image-text player-image-items ">
                        <div class="player-image-name" style="margin-top: -3em !important;">
                            <div class="player-site ">{{$player_details->player_shirt_num}}</div>
                            <div data-aos="fade-right" class="player-site-name ">{{$player_details->player_name}}</div>
                        </div>
                        <div data-aos="fade-right" class="player-image-message ">
                            "{{$player_details->quote}}"
                        </div>
                    </div>
                    <div class="player-image-image player-image-items ">
                        <img src="{{asset('public/uploads/player_details/'.$player_details->img)}}" alt="{{$player_details->player_name}}">
                    </div>
                    <div data-aos="fade-left" class="player-image-statics player-image-items player-image-image-none ">
                        <div class="player-mana-match ">
                            APPERANCES:
                            <span class="number number-1">{{$player_details->appearance}}</span>
                        </div>
                        <div class="player-wins ">
                            TOTAL GOALS:
                            <span class="number number-1">{{$player_details->total_goals}}</span>
                        </div>
                        <!-- <div class="player-draws ">
                            Draws:
                            <span class="number ">18</span>
                        </div>
                        <div class="player-loses ">
                            Loses:
                            <span class="number ">8</span>
                        </div> -->
                        <div class="player-trophies ">
                            TROPHIES:
                            <span class="number number-1">{{$player_details->trophies}}</span>
                        </div>
                    </div>
                </div>

                <div class="player-info ">
                    <div data-aos="fade-right" class="player-info-bio ">
                        <p class="player-bio-title ">Biography</p>
                        <p class="player-bio-text ">{{$player_details->bio}}</p>
                    </div>
                    <div data-aos="fade-left" class="player-info-shortcut " style="border-bottom: grey solid 1px; padding-bottom:1em ">
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">position</p>
                                <p class="player-items-position player-items-inf ">
                                    @switch($player_details->player_position)
                                        @case(1) Goalkeeper @break
                                        @case(2) Defender @break
                                        @case(3) Midfielder @break
                                        @case(4) Forward @break
                                        @default None
                                    @endswitch
                                </p>
                            </div>
                            <div class="player-sub-items ">
                                <p class="player-items-title ">joined</p>
                                <p class="player-items-date player-items-inf ">{{$player_details->joined}}</p>
                            </div>
                        </div>
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">country</p>
                                <p class="player-items-country player-items-inf "><img src="{{asset('public\uploads\team\vietnampng519.png')}}" alt=" " class="korea">Vietnam</p>
                            </div>
                            <div class="player-sub-items ">
                                <p class="player-items-title ">first match</p>
                                <p class="player-items-date player-items-inf "> 
                                    {{Carbon::createFromFormat('Y-m-d', $player_details->first_match)->format('d/m/Y')}}
                                </p>
                                <small>v {{$player_details->first_concurrent}}</small>
                            </div>
                        </div>
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">Club</p>
                                <p class="player-items-position player-items-inf ">
                                    {{$player_details->player_club}}
                                </p>
                            </div>
                            <div class="player-sub-items ">
                                <p class="player-items-title ">Date of birth</p>
                                <p class="player-items-date player-items-inf ">
                                    {{Carbon::createFromFormat('Y-m-d', $player_details->player_birth)->format('d F Y')}}</p>
                            </div>
                            
                        </div>
                    </div>


                    <div data-aos="fade-right" class="player-info-shortcut ">
                        <p class="player-bio-title ">Career statistics</p>
                        <div class="player-shortcut-items player-mana-match flex-basis-3 ">
                            <div class="player-sub-items ">
                                Apperances:
                                <span class="number ">{{$player_details->all_appearance}}</span>
                            </div>
                        </div>
                        <div class="player-shortcut-items wins flex-basis-4 ">
                            <div class="player-sub-items ">
                                Total goals:
                                <span class="number ">{{$player_details->all_total_goals}}</span>
                            </div>
                            <!-- <div class="player-sub-items ">Draws:
                                <span class="number "> 175</span> Loses:
                                <span class="number ">218</span>
                            </div> -->
                        </div>
                        <div class="player-shortcut-items player-trophies flex-basis-3 ">
                            <div class="sub-items ">
                                Trophies:
                                <span class="number ">{{$player_details->all_trophies}}</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End Manager -->
            </div>
            <!-- End Manager -->


        </div>
        <!-- End Content -->
@endsection