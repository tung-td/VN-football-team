@extends('layout')
@section('title','Player')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/myutd/player-detail.css')}}">
        <!-- START CONTENT -->
        <div class="content" style="padding-top: 30px">
            <!-- PLAYER DETAIL -->
            <div class="player" style="font-weight: 500; ">
                <div class="player-image-bg">
                    <div class="player-image-text player-image-items ">
                        <div class="player-image-name ">
                            <div class="player-site ">19</div>
                            <div data-aos="fade-right" class="player-site-name ">Nguyen Quang Hai</div>
                        </div>
                        <!-- <div data-aos="fade-right" class="player-image-message ">
                            "When I told you a little bit about the vision. The first is that we must make the most of our current resources. The second is to create a strong team in Southeast Asia, gradually forming a strong and competitive team in Asia."
                        </div> -->
                    </div>
                    <div class="player-image-image player-image-items ">
                        <img src="/assests/img2/player detail BG/quangHai-removebg-preview.png" alt=" ">
                    </div>
                    <div data-aos="fade-left" class="player-image-statics player-image-items player-image-image-none ">
                        <div class="player-mana-match ">
                            APPERANCES:
                            <span class="number number-1">42</span>
                        </div>
                        <div class="player-wins ">
                            TOTAL GOALS:
                            <span class="number number-1">10</span>
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
                            <span class="number number-1">2</span>
                        </div>
                    </div>
                </div>

                <div class="player-info ">
                    <div data-aos="fade-right" class="player-info-bio ">
                        <p class="player-bio-title ">Biography</p>
                        <p class="player-bio-text ">Nguyen Quang Hai (born 12 April 1997) is a Vietnamese professional footballer who plays as an attacking midfielder or winger for French club Pau FC in Ligue 2 and the national team. Vietnam country . He is the player who received
                            the Vietnam Golden Ball award in 2018 and is considered one of the best players in the history of Vietnamese football.</p>
                    </div>
                    <div data-aos="fade-left" class="player-info-shortcut " style="border-bottom: grey solid 1px; padding-bottom:1em ">
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">position</p>
                                <p class="player-items-position player-items-inf ">Midfielder</p>
                            </div>
                            <div class="player-sub-items ">
                                <p class="player-items-title ">joined</p>
                                <p class="player-items-date player-items-inf ">2017</p>
                            </div>
                        </div>
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">country</p>
                                <p class="player-items-country player-items-inf "><img src="/assests/img2/logo/vietnam_flag.png" alt=" " class="korea">Vietnam</p>
                            </div>
                            <div class="player-sub-items ">
                                <p class="player-items-title ">first match</p>
                                <p class="player-items-date player-items-inf "> 9/12/2017</p>
                                <small>v Myanmar(A)</small>
                            </div>
                        </div>
                        <div class="player-shortcut-items ">
                            <div class="player-sub-items ">
                                <p class="player-items-title ">Date of birth</p>
                                <p class="player-items-date player-items-inf ">12 April 1997</p>
                            </div>
                        </div>
                    </div>


                    <div data-aos="fade-right" class="player-info-shortcut ">
                        <p class="player-bio-title ">Career statistics</p>
                        <div class="player-shortcut-items player-mana-match flex-basis-3 ">
                            <div class="player-sub-items ">
                                Apperances:
                                <span class="number ">193</span>
                            </div>
                        </div>
                        <div class="player-shortcut-items wins flex-basis-4 ">
                            <div class="player-sub-items ">
                                Total goals:
                                <span class="number "> 41</span>
                            </div>
                            <!-- <div class="player-sub-items ">Draws:
                                <span class="number "> 175</span> Loses:
                                <span class="number ">218</span>
                            </div> -->
                        </div>
                        <div class="player-shortcut-items player-trophies flex-basis-3 ">
                            <div class="sub-items ">
                                Trophies:
                                <span class="number ">09</span>
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