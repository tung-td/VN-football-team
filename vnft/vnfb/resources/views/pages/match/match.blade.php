@extends('layout')
@section('title', 'Matches')
@section('content')
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/ticket/ticket.css')}}">
<div class="content" style="margin-top:75px">
<!-- Next Match -->
<div class="next-match mt-5">
    <div class="overlay position-absolute"></div>
    <div class="content position-absolute text-light text-center mt-4">
        <div data-aos="fade-down" data-aos  class="logo-tournament">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/AFC_text_logo.png/1200px-AFC_text_logo.png"
                alt="logo-tournament">
            <div class="responsive match-date">
                <h5>22:00 Thursday 02 June 2022</h5>
            </div>
        </div>
        <div class="row m-0">
            <div data-aos="fade-right" data-aos class="team-left text-end">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png"
                    alt="team-left">
                <h1><b>U23 VIETNAM</b></h1>
            </div>
            <div data-aos="zoom-in" data-aos  class="match-vs d-flex flex-column justify-content-center">
                <div class="match-date">
                    <h5>Thursday 02 June 2022</h5>
                </div>
                <h1>23:30</h1>
                <h2>vs</h2>
                <div class="match-kick-off">
                    <h5>Milliy Stadion</h5>
                    <h5>Kick Off in:</h5>
                </div>
            </div>
            <div data-aos="fade-left" data-aos  class="team-right text-start">
                <img src="https://vcdn-vnexpress.vnecdn.net/2017/03/16/thailand-2103-1489654634.jpg"
                    alt="team-right">
                <h1><b>U23 THAILAND</b></h1>
            </div>
        </div>
        <div class="match-countdown">
            <div data-aos="zoom-in" data-aos  class="responsive match-kick-off">
                <h5>Milliy Stadion</h5>
                <h5>Kick Off in:</h5>
            </div>
            <div data-aos="flip-down" data-aos  class="d-flex justify-content-center">
                <div class="d-flex">
                    <div>
                        <div>
                            <h1 id="ticketCountdownday">00</h1>
                        </div>
                        <div class="px-2">
                            <h6>days</h6>
                        </div>
                    </div>
                    <div>
                        <h1>:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 id="ticketCountdownhour">00</h1>
                        </div>
                        <div class="px-1">
                            <h6>hours</h6>
                        </div>
                    </div>
                    <div>
                        <h1>:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 id="ticketCountdownmin">00</h1>
                        </div>
                        <div class="px-2">
                            <h6>mins</h6>
                        </div>
                    </div>
                    <div>
                        <h1>:</h1>
                    </div>
                    <div>
                        <div>
                            <h1 id="ticketCountdownsec">00</h1>
                        </div>
                        <div class="px-2">
                            <h6>secs</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="match-button d-flex justify-content-center mt-2">
            <a class="btn-buy btn mx-4" href="{{route('ticket')}}">
                BUY TICKET
            </a>
            <a class="btn-more btn mx-4" href="#">
                SEE MORE
            </a>
        </div>
    </div>
</div>
<!-- End Next Match -->

<!-- Match List -->
<div class="text-center p-4" style=" width: 100%;">
    <div class="match-list container" style="width: 90%;">
        <div class="component-title text-start m-auto pb-3">
            <h1>
                MATCH LIST
            </h1>
            <div class="component-title-after"></div>
        </div>
        <div class="filter d-flex justify-content-between" style="width: 100%;">
            <div class="input-group" style="width: 20%;">
                <select class="custom-select border rounded px-2" id="inputGroupSelect01">
                    <option value="1" selected>AFC</option>
                    <option value="2">SEAGAME 31</option>
                    <option value="3">Friendly Match</option>
                </select>
            </div>
            <div class="month border text-start mx-2 rounded" style="width: 100%;">
                <div style="width: 100%;">
                    <div class="border rounded-top p-2" style="width:fit-content;">
                        <b>JUNE</b>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                <button type="radio" class="btn way-to-show border mx-2" onclick="ticketWaytoShow(1)"
                    name="options" id="option1" autocomplete="off" checked>
                    <h3 class="ti-menu-alt mb-0"></h3>
                </button>
                <button type="radio" class="btn way-to-show border" onclick="ticketWaytoShow(2)" name="options"
                    id="option2" autocomplete="off">
                    <h3 class="ti-menu-alt mb-0" style="transform: rotate(90deg);"></h3>
                </button>
            </div>
        </div>

        <!-- Matchh List 1 | Horizontal -->
        <div id="matchList1" class="content text-center" style="width: 100%;">
            <div class="container border rounded mt-3 p-3">

                <!-- match 1 -->
                <div data-aos="fade-right" class="match-list-item container border d-flex justify-content-between rounded p-2 mb-3">
                    <div class="d-flex">
                        <div class="ticket-info mx-2">
                            <div class="ticket-title text-start">
                                <h3><b>U23 VIETNAM vs U23 THAILAND</b></h3>
                            </div>
                            <div class="ticket-info-details d-flex align-items-center">
                                <div class="logo-tournament" style="margin-right: 20px;">
                                    <img class="rounded" style="height: 30px;"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/AFC_text_logo.png/1200px-AFC_text_logo.png"
                                        alt="logo-tournament">
                                </div>
                                <div class="ticket-date d-flex">
                                    <div class="ti-calendar"></div>
                                    <h6 class="mx-2 mb-0">Thu 02 June</h6>
                                </div>
                                <div class="ticket-time d-flex mx-2">
                                    <div class="ti-time"></div>
                                    <h6 class="mx-2 mb-0">22:00</h6>
                                </div>
                                <div class="ticket-destination d-flex">
                                    <div class="ti-map-alt"></div>
                                    <h6 class="mx-2 mb-0">Milliy Stadion</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="logo-team1">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png"
                                alt="logo-team1">
                        </div>
                        <div class="logo-team2">
                            <img src="https://vcdn-vnexpress.vnecdn.net/2017/03/16/thailand-2103-1489654634.jpg"
                                alt="logo-team2">
                        </div>
                        <div class="buy-ticket d-flex align-items-center">
                            <div class="btn">BUY TICKET</div>
                        </div>
                    </div>
                </div>

                <!-- match 2 -->
                <div data-aos="fade-right" class="match-list-item container border d-flex justify-content-between rounded p-2 mb-3">
                    <div class="d-flex">
                        <div class="ticket-info mx-2">
                            <div class="ticket-title text-start">
                                <h3><b>U23 KOREA vs U23 VIETNAM</b></h3>
                            </div>
                            <div class="ticket-info-details d-flex align-items-center">
                                <div class="logo-tournament" style="margin-right: 20px;">
                                    <img class="rounded" style="height: 30px;"
                                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/AFC_text_logo.png/1200px-AFC_text_logo.png"
                                        alt="logo-tournament">
                                </div>
                                <div class="ticket-date d-flex">
                                    <div class="ti-calendar"></div>
                                    <h6 class="mx-2 mb-0">Sun 05 June</h6>
                                </div>
                                <div class="ticket-time d-flex mx-2">
                                    <div class="ti-time"></div>
                                    <h6 class="mx-2 mb-0">20:00</h6>
                                </div>
                                <div class="ticket-destination d-flex">
                                    <div class="ti-map-alt"></div>
                                    <h6 class="mx-2 mb-0">Lokomotiv Stadium Tashkent</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="logo-team1">
                            <img src="../../assests/img2/playersAvatar/managers/Flag_of_South_Korea.svg.webp"
                                alt="logo-team1">
                        </div>
                        <div class="logo-team2">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png"
                                alt="logo-team2">
                        </div>
                        <div class="buy-ticket d-flex align-items-center">
                            <div class="btn">BUY TICKET</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Matchh List 2 | Vertical -->
        <div id="matchList2" class="d-none content text-center" style="width: 100%;">
            <div class="container d-flex border rounded mt-3 p-3" style="width: 100%;">

                <!-- match 1 -->
                <div
                    data-aos="fade-right" class="match-list-item container d-flex flex-column justify-content-between border rounded mx-2 px-0">
                    <div class="item-head d-flex justify-content-between rounded-top text-light">
                        <div class="d-flex">
                            <div class="p-2">
                                <h1 class="mb-0">02</h1>
                            </div>
                            <div class="py-2 text-start">
                                <div>
                                    <h5 class="mb-0">THURSDAY</h5>
                                </div>
                                <div>
                                    <h6 class="mb-0">JUNE</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="px-2">
                            <h6>
                                Milliy Stadion
                            </h6>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <img style="width: 80px;"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png"
                                    alt="manutd">
                            </div>
                            <div class="text-dark px-1">
                                <div>
                                    <h6 class="mb-0">
                                        Kick off UTC+7
                                    </h6>
                                </div>
                                <div>
                                    <h2 class="mb-0">22:00</h2>
                                </div>
                            </div>
                            <div>
                                <img style="width: 80px;"
                                    src="https://vcdn-vnexpress.vnecdn.net/2017/03/16/thailand-2103-1489654634.jpg"
                                    alt="brentford">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-dark pt-2">
                            <div class="logo-tournament px-2">
                                <img class="rounded" style="width: 100px;"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/AFC_text_logo.png/1200px-AFC_text_logo.png"
                                    alt="PremierLeague">
                            </div>
                        </div>
                        <div class="text-dark pt-2">
                            <h5 class="mb-0">
                                U23 VIETNAM vs U23 THAILAND
                            </h5>
                        </div>
                    </div>
                    <div class="buy-ticket d-flex justify-content-around pb-2">
                        <div class="btn">
                            <h3 class="mb-0">BUY TICKET</h3>
                        </div>
                    </div>
                </div>

                <!-- match 2 -->
                <div
                    data-aos="fade-right" class="match-list-item container d-flex flex-column justify-content-between border rounded mx-2 px-0">
                    <div class="item-head d-flex justify-content-between rounded-top text-light">
                        <div class="d-flex">
                            <div class="p-2">
                                <h1 class="mb-0">05</h1>
                            </div>
                            <div class="py-2 text-start">
                                <div>
                                    <h5 class="mb-0">SUNDAY</h5>
                                </div>
                                <div>
                                    <h6 class="mb-0">JUNE</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="px-2">
                            <h6>
                                Lokomotiv Stadium Tashkent
                            </h6>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                                <img class="border" style="width: 80px;"
                                    src="../../assests/img2/playersAvatar/managers/Flag_of_South_Korea.svg.webp"
                                    alt="manutd">
                            </div>
                            <div class="text-dark px-1">
                                <div>
                                    <h6 class="mb-0">
                                        Kick off UTC+7
                                    </h6>
                                </div>
                                <div>
                                    <h2 class="mb-0">20:00</h2>
                                </div>
                            </div>
                            <div>
                                <img style="width: 80px;"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg/230px-Flag_of_North_Vietnam_%281955%E2%80%931976%29.svg.png"
                                    alt="brentford">
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center text-dark pt-2">
                            <div class="logo-tournament px-2">
                                <img class="rounded" style="width: 100px;"
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/AFC_text_logo.png/1200px-AFC_text_logo.png"
                                    alt="PremierLeague">
                            </div>
                        </div>
                        <div class="text-dark pt-2">
                            <h5 class="mb-0">
                                U23 KOREA vs U23 VIETNAM
                            </h5>
                        </div>
                    </div>
                    <div class="buy-ticket d-flex justify-content-around pb-2">
                        <div class="btn">
                            <h3 class="mb-0">BUY TICKET</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Match List -->

<!-- Match Category -->
<div class="text-center p-4" style="width: 100%;">
    <div class="container category-match" style="width: 90%;">
        <div class="component-title text-start m-auto pb-3">
            <h1>
                MATCH CATEGORY
            </h1>
            <div class="component-title-after"></div>
        </div>
        <div class="match-category justify-content-center mb-3">

            <div data-aos="flip-left"
                class="ticket-cate-item position-relative d-flex flex-column justify-content-center bg-dark text-light mx-2">
                <div class="position-absolute image"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: url(https://sport5.mediacdn.vn/thumb_w/700/158855217956261888/2022/5/19/2dfdaf22119bd0c5898a95-16529705979981368577869.jpg); background-size: cover;"
                    alt="match-category"></div>
                <div class="position-absolute"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));">
                </div>
                <div class="ticket-cate-content position-absolute d-flex flex-column justify-content-end text-start p-3"
                    style="width: 100%; height: inherit;">
                    <div style="width: 50%; overflow: hidden;">
                        <div class="ticket-cate-progress mb-2"></div>
                    </div>
                    <h4 class="mb-2"><b>MATCH - MEN</b></h4>
                    <h6 class="mb-3">Check availability for home games at My Dinh Stadium</h6>
                    <div class="">
                        <button class="btn text-light p-2 px-4">MORE INFO</button>
                    </div>
                </div>
            </div>

            <div data-aos="flip-left"
                class="ticket-cate-item position-relative d-flex flex-column justify-content-center bg-dark text-light mx-2">
                <div class="position-absolute image"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: url(https://secure3.vncdn.vn/ttnew/r/2022/02/07/8-16441574132331208797852-1644224093.jpg); background-size: cover;"
                    alt="match-category"></div>
                <div class="position-absolute"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));">
                </div>
                <div class="ticket-cate-content position-absolute d-flex flex-column justify-content-end text-start p-3"
                    style="width: 100%; height: inherit;">
                    <div style="width: 50%; overflow: hidden;">
                        <div class="ticket-cate-progress mb-2"></div>
                    </div>
                    <h4 class="mb-2"><b>MATCH - WOMEN</b></h4>
                    <h6 class="mb-3">Check availability for home games at My Dinh Stadium</h6>
                    <div class="">
                        <button class="btn text-light p-2 px-4">MORE INFO</button>
                    </div>
                </div>
            </div>

            <div data-aos="flip-left"
                class="ticket-cate-item position-relative d-flex flex-column justify-content-center bg-dark text-light mx-2">
                <div class="position-absolute image"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: url(http://image.vietnamnews.vn/uploadvnnews/Article/2022/2/13/201018_p28a.jpeg); background-size: cover;"
                    alt="match-category"></div>
                <div class="position-absolute"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));">
                </div>
                <div class="ticket-cate-content position-absolute d-flex flex-column justify-content-end text-start p-3"
                    style="width: 100%; height: inherit;">
                    <div style="width: 50%; overflow: hidden;">
                        <div class="ticket-cate-progress mb-2"></div>
                    </div>
                    <h4 class="mb-2"><b>MATCH - YOUNGS</b></h4>
                    <h6 class="mb-3">Check availability for home games at My Dinh Stadium</h6>
                    <div class="">
                        <button class="btn text-light p-2 px-4">MORE INFO</button>
                    </div>
                </div>
            </div>

            <div data-aos="flip-left"
                class="ticket-cate-item position-relative d-flex flex-column justify-content-center bg-dark text-light mx-2">
                <div class="position-absolute image"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: url(http://image.vietnamnews.vn/uploadvnnews/Article/2020/6/14/93042_vn.jpg); background-size: cover;"
                    alt="match-category"></div>
                <div class="position-absolute"
                    style="width: 100%; height: 400px; border-radius: 10px; background-image: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,1));">
                </div>
                <div class="ticket-cate-content position-absolute d-flex flex-column justify-content-end text-start p-3"
                    style="width: 100%; height: inherit;">
                    <div style="width: 50%; overflow: hidden;">
                        <div class="ticket-cate-progress mb-2"></div>
                    </div>
                    <h4 class="mb-2"><b>HOSPITALITY</b></h4>
                    <h6 class="mb-3">Secure your seats for all home games</h6>
                    <div class="">
                        <button class="btn text-light p-2 px-4">BUY NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Match Category -->
<!-- Slider -->
<div class="slider-homepage" style="margin-bottom: 200px;">
    <div class=" position-relative " style="width: 100%; height:1000px;">
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
    </div>
</div>
<!-- Slider -->
<!-- <div class="slider-homepage">
    <div class=" position-relative sld-tickets" data-aos="zoom-in">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../assests/img2/carousel/u23-3.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assests/img2/carousel/pic8.jpeg " alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../assests/img2/carousel/fanHamMo.jpg "
                        alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div> -->
</div>
<script src="{{asset('public/client/js/custom/pages/ticket/ticket.js')}}"></script>
@endsection