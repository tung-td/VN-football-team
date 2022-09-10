@extends('layout')
@section('title','Vietnam National Football Team Website')
@section('content')
<?php
    use Carbon\Carbon;
    Carbon::setLocale('en');
    $datetime_now = Carbon::now()->toDateTimeString();
?>
<!-- Toast -->
<div id="toast"></div>

<!-- CUSTOM -->
<!-- Start Slider -->
<div class="slider">
    <!-- Video background -->
    <div style="display: flex; position: relative;">
        <video autoplay muted loop id="myVideo" style="width: 100%; position: relative;">
            <source src="{{asset('public/client/img/custom/img2/video/Trailer Night Wolf V.League 1 - 2022 - VPF Media.mp4')}}"
                type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="video-btn" style="position: absolute; bottom: 0; z-index: 1; font-size: 70px; ">
            <button style="background-color: Transparent; cursor:pointer;"
                onclick="vidCarouselControlFunction()">
                <div id="videoCarouselControl" class="ti-control-pause material-icons" style="color: #2a2a2a; font-size:50px!important;">play_arrow</div>
            </button>
            <button style="background-color: Transparent; cursor:pointer;" onclick="vidCarouselSoundFunction()">
                <div id="videoCarouselSound" class="ti-volume material-icons" style="color: #2a2a2a; font-size:50px!important;">volume_up</div>
            </button>
        </div>
    </div>
    <!-- End Video background -->

</div>
<!-- End Slider -->

<!-- START CONTENT -->
<div class="content" style="padding-top: 3.5em">

    <!-- Matches / Tickets -->
    <div class="matches-tickets bg-dark m-auto my-4">

        <div class="matches-background position-absolute"></div>
        <div class="matches-content position-absolute text-center text-light p-2">

            <!-- content head -->
            <div class="content-head container-fluid d-flex justify-content-between">
                <div>
                    <h1 class="first-team-matches">
                        FIRST TEAM MATCHES
                    </h1>
                </div>
                <input value="{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('M d, Y H:i:s')}}" 
                    type="text" hidden="hidden" id="timeCountDown" />
                <div class="ticket-cownt-down d-flex">
                    <div>
                        <div>
                            <h1 class="cownt-down-value" id="ticketCountdownday">00</h1>
                        </div>
                        <div class="px-2">
                            <h6 class="cownt-down-unit">days</h6>
                        </div>
                    </div>
                    <div>
                        <h1 class="cownt-down-value">:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 class="cownt-down-value" id="ticketCountdownhour">00</h1>
                        </div>
                        <div class="px-1">
                            <h6 class="cownt-down-unit">hours</h6>
                        </div>
                    </div>
                    <div>
                        <h1 class="cownt-down-value">:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 class="cownt-down-value" id="ticketCountdownmin">00</h1>
                        </div>
                        <div class="px-2">
                            <h6 class="cownt-down-unit">mins</h6>
                        </div>
                    </div>
                    <div>
                        <h1 class="cownt-down-value">:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 class="cownt-down-value" id="ticketCountdownsec">00</h1>
                        </div>
                        <div class="px-2">
                            <h6 class="cownt-down-unit">secs</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arrow button -->
            <div class="matches-next ti-arrow-circle-right text-light material-icons">arrow_forward</div>
            <div class="matches-previous ti-arrow-circle-left text-light material-icons">arrow_back</div>

            <!-- Content body -->
            <div
                class="content-body container-fluid d-flex py-2 justify-content-center align-items-center variable-width-matches">

                <!-- View all result -->
                <div class="matches item container bg-dark mx-2 p-0">
                    <div class="item-background view-all-result position-absolute ml-0"></div>
                    <div
                        class="item-content position-absolute d-flex justify-content-center align-items-center">
                        <div>
                            <h1 href="https://toigingiuvedep.vn/wp-content/uploads/2021/08/hinh-anh-doi-tuyen-viet-nam.jpg">
                                VIEW ALL RESULT
                            </h1>
                        </div>
                    </div>
                </div>

                @foreach($recent_match as $key => $match)
                <!-- Matches - recent match -->
                <div class="matches item container d-flex flex-column justify-content-between mx-2 px-0">
                    <div class="item-head d-flex justify-content-between text-light">
                        <div class="d-flex">
                            <div class="p-2">
                                <h1 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('d')}}</h1>
                            </div>
                            <div class="text-start py-2">
                                <div>
                                    <h5 class="mb-0" style="text-transform: uppercase;">{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('l')}}</h5>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('F')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <h5 class="mb-0">RECENT</h5>
                            <h5 class="mb-0">MATCH</h5>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="px-2">
                            <h6>
                                {{$match->stadium}}
                            </h6>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamA_id)
                                    <img style="width: 100px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}" alt="{{$team->team_name}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="text-dark px-1">
                                <div>
                                    <h6 class="mb-0">
                                        {{$match->type}}
                                    </h6>
                                </div>
                                <div>
                                    <h1 class="mb-0">{{$match->teamA_goals}}-{{$match->teamB_goals}}</h1>
                                </div>
                            </div>
                            <div>
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamB_id)
                                    <img style="width: 100px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}" alt="{{$team->team_name}}">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-dark pt-2">
                            <div class="px-2">
                                <img class="logo-tournament"
                                    src="{{URL('public/uploads/tournament/'.$match->tournament_image)}}" alt="{{$match->tournament_name}}">
                            </div>
                        </div>
                        <div class="text-dark pt-2">
                            <h5 class="mb-0">
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamA_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                                    vs 
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamB_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around p-2">
                        <div class="btn see-more">
                            <h3 class="mb-0">SEE MORE</h3>
                        </div>
                    </div>
                </div>
                <!-- End Matches - recent match -->
                @endforeach

                <!-- Matches - next match -->
                <div
                    class="matches item match-main container d-flex flex-column justify-content-between text-dark mx-2 p-0">
                    <div class="item-head d-flex justify-content-between text-light">
                        <div class="d-flex">
                            <div class="p-2">
                                <h1 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('d')}}</h1>
                            </div>
                            <div class="py-2" style="text-align: left !important;">
                                <div>
                                    <h5 class="mb-0" style="text-transform: uppercase;">{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('l')}}</h5>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('F')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <h1 class="head-right mb-0">NEXT MATCH</h1>
                        </div>
                    </div>
                    <div>
                        <div class="responsive-show px-2 d-none">
                            <h6>
                                {{$next_match->stadium}}
                            </h6>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            @foreach($list_team as $key => $team)
                                @if($team->id == $next_match->teamA_id)
                                <div class="match-team">
                                    <img style="width: 150px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}"
                                        alt="{{$team->team_name}}">
                                </div>
                                @endif
                            @endforeach
                            <div class="px-3">
                                <div>
                                    <h6 class="mb-0">
                                        {{$next_match->type}}
                                    </h6>
                                </div>
                                <div>
                                    <h1 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $next_match->datetime)->format('H:i')}}</h1>
                                </div>
                                <div class="responsive-hide">
                                    <h6>
                                        {{$next_match->stadium}}
                                    </h6>
                                </div>
                                <div class="responsive-hide">
                                    <img class="logo-tournament"
                                        src="{{URL('public/uploads/tournament/'.$next_match->tournament_image)}}"
                                        alt="{{$next_match->tournament_name}}">
                                </div>
                            </div>
                            @foreach($list_team as $key => $team)
                                @if($team->id == $next_match->teamB_id)
                                <div class="match-team">
                                    <img style="width: 150px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}"
                                        alt="{{$team->team_name}}">
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-dark pt-2">
                            <div class="responsive-show d-none px-2 text-center">
                                <img class="" style="width: 100px; border-radius: 10px;"
                                    src="{{URL('public/uploads/tournament/'.$next_match->tournament_image)}}"
                                    alt="{{$next_match->tournament_name}}">
                            </div>
                        </div>
                        <div class="pt-2">
                            <h3 class="match-title mb-0">
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamA_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                                    vs 
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamB_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around p-2">
                        @if($next_match->ticket == 1)
                        <div class="btn buy-ticket" style="width: 40%;">
                            <h3 class="mb-0">BUY TICKET</h3>
                        </div>
                        @endif
                        <div class="btn see-more" style="width: 40%;">
                            <h3 class="mb-0">SEE MORE</h3>
                        </div>
                    </div>
                </div>
                <!-- End Matches - next match -->

                @foreach($future_match as $key => $match)
                <!-- Matches - future match -->
                <div class="matches item container d-flex flex-column justify-content-between mx-2 px-0">
                    <div class="item-head d-flex justify-content-between text-light">
                        <div class="d-flex">
                            <div class="p-2">
                                <h1 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('d')}}</h1>
                            </div>
                            <div class="py-2" style="text-align: left !important;">
                                <div>
                                    <h5 style="text-transform: uppercase;" class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('l')}}</h5>
                                </div>
                                <div>
                                    <h6 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('M')}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="p-2">
                            <h5 class="mb-0">FUTURE</h5>
                            <h5 class="mb-0">MATCH</h5>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="px-2">
                            <h6>
                                {{$match->stadium}}
                            </h6>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamA_id)
                                    <img style="width: 100px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}" alt="{{$team->team_name}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="text-dark px-1">
                                <div>
                                    <h6 class="mb-0">
                                        {{$match->type}}
                                    </h6>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{Carbon::createFromFormat('Y-m-d H:i:s', $match->datetime)->format('H:i')}}</h2>
                                </div>
                            </div>
                            <div>
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamB_id)
                                    <img style="width: 100px;"
                                        src="{{URL('public/uploads/team/'.$team->team_image)}}" alt="{{$team->team_name}}">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-dark pt-2">
                            <div class="px-2">
                                <img class="logo-tournament"
                                src="{{URL('public/uploads/tournament/'.$match->tournament_image)}}"
                                    alt="{{$match->tournament_name}}">
                            </div>
                        </div>
                        <div class="text-dark pt-2">
                            <h5 class="mb-0">
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamA_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                                    vs 
                                <span style="text-transform: uppercase;">
                                @foreach($list_team as $key => $team)
                                    @if($team->id == $match->teamB_id) {{$team->team_name}} @endif
                                @endforeach
                                </span>
                            </h5>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around p-2">
                        <div class="btn see-more">
                            <h3 class="mb-0">COMING SOON</h3>
                        </div>
                    </div>

                </div>
                <!-- Matches - future match -->
                @endforeach

                <div class="matches item container bg-dark mx-2 p-0"
                    style="width: 300px; height: 350px; border-radius: 25px;">
                    <div class="position-absolute ml-0"
                        style="width: 300px; height: inherit; opacity: 0.3; border-radius: 25px; background-image: url(https://i.pinimg.com/564x/45/dc/87/45dc873741b58dc48170c6e1294e40f1.jpg); background-size: cover;">
                    </div>
                    <div class="position-absolute d-flex justify-content-center align-items-center"
                        style="width: 300PX; height: inherit;">
                        <div>
                            <h1>
                                VIEW ALL FIXTURE
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Matches / Tickets -->

    <!-- News -->
    <div class="container container-index" style="margin-top: 20px !important; margin-bottom: 20px !important;">

        <!-- Line 9 -->
        <div class="card-group">
            @foreach($all_post as $key => $post)
            <a data-aos="fade-right" data-aos class="card bg-dark text-white un-border line-9"
                style="margin-left: 0px" href="{{URL('/bai-viet/'.$post->post_id)}}">
                <img class="card-img" src="{{asset('public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$post->post_title}}">
                <div class="card-img-overlay">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <div class="bottom-text">
                        <p class="card-text">
                            <small class="text-muted white" style="color: #fff !important;">
                                <?php
                                    $dt = Carbon::parse($post->created_at);
                                    $now = Carbon::now();
                                    echo $dt->diffForHumans($now);
                                ?>
                                    | 
                                @foreach($category_post as $key => $cate)
                                    @if($cate->category_id == $post->cate_post_id)
                                        {{$cate->category_name}}
                                    @endif
                                @endforeach
                            </small>
                        </p>
                        <!-- <i class="ti-new-window white"></i> -->
                        <i class="material-icons">open_in_new</i>
                    </div>
                </div>
            </a>
            @break
            @endforeach
            @php
                $count = 0;
            @endphp
            @foreach($all_post as $key => $post)
            @if($count == 1)
            <a data-aos="fade-left" data-aos class="card bg-dark text-white un-border line-9"
                style="margin-right: 0px" href="{{URL('/bai-viet/'.$post->post_id)}}">
                <img class="card-img" src="{{asset('public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$post->post_title}}">
                <div class="card-img-overlay">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <div class="bottom-text">
                        <p class="card-text">
                            <small class="text-muted white" style="color: #fff !important;">
                                <?php
                                    $dt = Carbon::parse($post->created_at);
                                    $now = Carbon::now();
                                    echo $dt->diffForHumans($now);
                                ?>
                                    | 
                                @foreach($category_post as $key => $cate)
                                    @if($cate->category_id == $post->cate_post_id)
                                        {{$cate->category_name}}
                                    @endif
                                @endforeach
                            </small>
                        </p>
                        <!-- <i class="ti-new-window white"></i> -->
                        <i class="material-icons">open_in_new</i>
                    </div>
                </div>
            </a>
            @break
            @else
                @php
                    $count++;
                @endphp
            @endif
            @endforeach
        </div>

        <!-- Line 3 -->
        <div class="card-group ">
            @php
                $count = 1;
            @endphp
            @foreach($all_post as $key => $post)
                @if($count>=3)
                <a data-aos="fade-up" data-aos class="card card-group" href="{{URL('/bai-viet/'.$post->post_id)}}">
                    <img class="card-img-top" src="{{asset('public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$post->post_title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->post_title}}</h5>
                        <p class="card-text">{{$post->post_meta_desc}}</p>
                        <div class="bottom-text">
                            <p class="card-text"><small class="text-muted">
                                    <?php
                                        $dt = Carbon::parse($post->created_at);
                                        $now = Carbon::now();
                                        echo $dt->diffForHumans($now);
                                    ?>
                                     | 
                                    @foreach($category_post as $key => $cate)
                                        @if($cate->category_id == $post->cate_post_id)
                                            {{$cate->category_name}}
                                        @endif
                                    @endforeach
                            </small></p>
                            <!-- <i class="ti-new-window icon"></i> -->
                                <i class="material-icons">open_in_new</i>
                        </div>
                    </div>
                </a>
                @else
                    @php
                        $count++;
                    @endphp
                    @if($count>=6)
                        @break
                    @endif
                @endif
            @endforeach
        </div>
    </div>
    <!--End News -->

    <!-- Manager -->
    <div class="manager " style="font-weight: 500; ">
        <div class="manager-image ">
            <div class="image-text manager-image-items ">
                <div class="image-name ">
                    <div class="site ">Manager</div>
                    <div data-aos="fade-right" class="site-name ">Park Hang Seo</div>
                </div>
                <div data-aos="fade-right" class="image-message ">
                    "When I told you a little bit about the vision. The first is that we must make the most of
                    our current resources. The second is to create a strong team in Southeast Asia, gradually
                    forming a strong and competitive team in Asia."
                </div>
            </div>
            <div class="image-image manager-image-items ">
                <img src="{{asset('public/client/img/custom/img2/playersAvatar/managers/Park.png')}} " alt=" ">
            </div>
            <div data-aos="fade-left" class="image-statics manager-image-items image-image-none ">
                <div class="mana-match ">
                    Matches:
                    <span class="number ">31</span>
                </div>
                <div class="wins ">
                    Wins:
                    <span class="number ">15</span>
                </div>
                <div class="draws ">
                    Draws:
                    <span class="number ">18</span>
                </div>
                <div class="loses ">
                    Loses:
                    <span class="number ">8</span>
                </div>
                <div class="trophies ">
                    Trophies:
                    <span class="number ">4</span>
                </div>
            </div>
        </div>

        <div class="manager-info ">
            <div data-aos="fade-right" class="info-bio ">
                <p class="bio-title ">Biography</p>
                <p class="bio-text ">On 29 September 2017, Park was appointed the head coach of the Vietnam
                    national football team. Also in charge of the under-23 side, the team reached the final of
                    the 2018 AFC U-23 Championship, which is Vietnam's first final in
                    the official AFC competitions. At the 2018 Asian Games, his side also advanced to the
                    semi-finals and finished fourth for the first time in 56 years, with Park earning praise for
                    his management. On 15 December 2018, the Vietnamese
                    team under Park won the AFF Championship after defeating Malaysia, 3–2 on aggregate, in the
                    second leg of the finals in Mỹ Đình National Stadium of Hanoi. This was Vietnam's first
                    regional championship in ten years. With the
                    Olympic side, Park won the gold medal at the 2019 Southeast Asian Games.</p>
            </div>
            <div data-aos="fade-left" class="info-shortcut "
                style="border-bottom: grey solid 1px; padding-bottom:1em ">
                <div class="shortcut-items ">
                    <div class="sub-items ">
                        <p class="items-title ">position</p>
                        <p class="items-position items-inf ">manager</p>
                    </div>
                    <div class="sub-items ">
                        <p class="items-title ">joined</p>
                        <p class="items-date items-inf ">2017</p>
                    </div>
                </div>
                <div class="shortcut-items ">
                    <div class="sub-items ">
                        <p class="items-title ">country</p>
                        <p class="items-country items-inf "><img
                                src="{{asset('public/client/img/custom/img2/playersAvatar/managers/Flag_of_South_Korea.svg.webp')}} "
                                alt=" " class="korea"> The Republic of Korea</p>
                    </div>
                    <div class="sub-items ">
                        <p class="items-title ">first match</p>
                        <p class="items-date items-inf "> 9/12/2017</p>
                        <small>v Myanmar(A)</small>
                    </div>
                </div>
                <div class="shortcut-items ">
                    <div class="sub-items ">
                        <p class="items-title ">Date of birth</p>
                        <p class="items-date items-inf ">1 October 1957</p>
                    </div>
                </div>
            </div>


            <div data-aos="fade-right" class="info-shortcut ">
                <p class="bio-title ">Career statistics</p>
                <div class="shortcut-items mana-match flex-basis-3 ">
                    <div class="sub-items ">
                        Matches:
                        <span class="number ">749</span>
                    </div>
                </div>
                <div class="shortcut-items wins flex-basis-4 ">
                    <div class="sub-items ">
                        Wins(47,53%):
                        <span class="number "> 356</span>
                    </div>
                    <div class="sub-items ">Draws:
                        <span class="number "> 175</span> Loses:
                        <span class="number ">218</span>
                    </div>
                </div>
                <div class="shortcut-items trophies flex-basis-3 ">
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

    <!-- Slider -->
    <!-- <div class="slider-homepage" style="margin-bottom: 200px;">
        <div class=" position-relative " style="width: 100%; height:1000px;">
            <div class="d-flex " style="position: absolute; width: inherit; ">
                <div class="slider-previous ti-angle-left " style="top: 17rem ;"></div>
                <div class="slider-next ti-angle-right " style="top: 17rem ;"></div>
            </div>
            <div class="forSlickSlider single-item-slider " style="max-height: 700px !important;">
                @foreach($slider as $key => $slide)
                <div class="item ">
                    <img src="{{url('public/uploads/slider/'.$slide->slider_image)}}" alt="{{$slide->slide_name}} ">
                </div>
                @endforeach
            </div>
        </div>
    </div> -->
    <div class="slider-homepage">
        <div class=" position-relative "  data-aos="zoom-in">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $count = 0;
                    @endphp
                    @foreach($slider as $key => $slide)
                        @if($slide->slider_level == 1)
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
                        @if($slide->slider_level == 1)
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
        </div>
    </div>
    <!-- End Slider -->

    <!-- STORE -->
    <br>
    @foreach($category as $key => $cate)
    <div class="container store-container ">
        <h3 class="h3" href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}"> 
            <!-- {{$cate->category_name}}  -->
            VIETNAM FOOTBALL KITS
        </h3>
        <!-- {{$cate->category_desc}} -->
        <div id="products ">
            <div class="row mx-0 ">
                <div class="row ">
                    @php
                        $count=1
                    @endphp

                    @foreach($list_product as $key => $product)

                    @if($count<=4 && $product->category_id==$cate->category_id)
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
                                    <li><button onclick="showSuccessCartToast('add_to_cart','{{$product->product_name}}',1,'{{URL('/cart')}}');" type="button" class="buy-product form-control btn add-to-cart" data-id_product="{{$product->product_id}}" id="add-to-cart" name="add-to-cart" style="border-radius: 50px;">
                                        <i class="fa fa-shopping-cart"></i>
                                    </button></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="{{URL('chi-tiet-san-pham/'.$product->product_id)}}">
                                        <i class="fa fa-search"></i></a></li>
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
    @break
    @endforeach
    <!-- End Store -->

    <!-- Moments -->
    <div class="Moments "
        style="background: url(https://st.quantrimang.com/photos/image/2021/02/04/Hinh-nen-Quoc-Ky-VN-13.jpg); background-position: center; background-size: cover">
        <div class="moments-content ">
            <div class="Moment_header ">
                <img class="header_logo " src="{{asset('public/client/img/custom/img2/logo/LogoVN.webp')}}" alt=" ">
                <div class="header_tile ">Special features</div>
            </div>

            <!-- Moments -->
            <div class="container-fluid ">
                <div class="d-flex m-auto p-3 multiple-items-moments "
                    style="width: 90%; height: 400px; border-radius: 10px; padding-top: 1rem !important; padding-bottom: 0 !important; ">
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/le-cong-vinh.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                2008: Le Cong Vinh's Historic Goal Against Thailand</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/U23-Viet-Nam.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                2018: AFC U-23 Asian Cup Final In Changzhou, China</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/m1.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                2022: Gold Medal Of Seagame 31 - U23 VIETNAM</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/Aff-1479253464147.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                The Champion of AFF Suzuki Cup 2008</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/170327-duy-manh-cam-co-1.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                2018: Memory In Changzhou</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/viet_nam_vo_dich.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                The Champion of AFF CUP 2018</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/q-1590505099.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                DO HUNG DUNG, Vietnam Golden Ball 2019</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/carousel/pic10.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                2022: Gold Medal Of Seagame 31 - U23 WOMEN VIETNAM</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/ha-thai-lan-sau-120-phut-tuyen-nu-viet-nam-vo-dich-dong-nam-a-1.jpg) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                The AFF WOMEN'S CHAMPIONSHIP 2019</h1>
                        </div>
                    </div>
                    <div class="item bg-dark text-light mx-2 "
                        style="width: 310px; height: 360px; border-radius: 10px; ">
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background: url(public/client/img/custom/img2/moments/park.webp) top / cover ">
                        </div>
                        <div class="position-absolute "
                            style="width: inherit; height: inherit; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.3)); ">
                        </div>
                        <div class="position-absolute d-flex flex-column justify-content-end "
                            style="width: inherit; height: inherit; ">
                            <h1
                                style="font-size:14px; opacity: 1; text-align: center; padding-bottom: 5px; text-transform: uppercase ">
                                thank you, Park hang seo</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Moments -->
        </div>



        <div class="Moment_footer ">
            <a href="# " class="footer_title ">
                See more special features
                <!-- <i class="ti-angle-double-right "></i> -->
            </a>

        </div>
    </div>
    <!-- End Moments -->

    <!-- Cup Trophies -->
    <div class="content__cup ">
        <div class="cup-logo">
            <!-- <img src="./assests/img2/logo/225px-Flag_of_Vietnam.svg.png" alt=" "> -->
            <h2 class="h3">Vietnam's Titles</h2>
        </div>

        <div class="cups__slider " style="color: #000; ">
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/affcup.png ')}}" alt="AFF CUP - 2 ">
                </div>
                <figcaption>
                    <p>AFF Suzuki Cup</p>
                    <strong>2</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/AFFU23.png')}}" alt="AFF U23 Championship Cup - 1 ">
                </div>
                <figcaption>
                    <p>AFF U23 Championship</p>
                    <strong>1</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/goldMedal.png ')}}" alt="Gold Medal Seagame - 2 ">
                </div>
                <figcaption>
                    <p>Seagame Gold Medal</p>
                    <strong>2</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/afcu23championship.png')}}" alt="AFFC U23 Championship - 2nd ">
                </div>
                <figcaption>
                    <p>AFC U23 Championship</p>
                    <strong>2nd</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/Asian_cup_trophy_2019-.png')}}" alt="AFC Asian Cup ">
                </div>
                <figcaption>
                    <p>AFC Asian Cup</p>
                    <strong>0</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/fifa-world-cup.png')}}" alt="FIFA World Cup ">
                </div>
                <figcaption>
                    <p>FIFA World Cup</p>
                    <strong>0</strong>
                </figcaption>
            </figure>
            <figure class="cup-items ">
                <div>
                    <img data-aos="flip-left" src="{{asset('public/client/img/custom/img2/cup/AyaBankCup.png ')}}" alt="AYA Bank Cup 2016 - 1 ">
                </div>
                <figcaption>
                    <p>AYA Bank Cup 2016</p>
                    <strong>1</strong>
                </figcaption>
            </figure>
        </div>
    </div>
    <!-- End cup tropies -->
</div>
<!-- End Content -->
@endsection