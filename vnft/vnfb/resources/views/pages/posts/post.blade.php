@extends('layout')
@section('title',$this_post->post_title)
@section('content')
<!-- Content news -->
<link rel="stylesheet" href="{{asset('public/client/css/custom/pages/news/news.css')}}">
    <link rel="stylesheet" href="{{asset('public/client/css/custom/pages/news/news_details.css')}}">
<div class="container" style="margin-top: 100px !important;">
    <div class="content_news">
        <div class="header_news">
            <div class="hd_right">
                <!-- <i class="ti-user dq icons_size"></i> -->
                <i class="material-icons">category</i>
                <p class="name_writer">
                    @foreach($category_post as $key => $cate)
                        @if($cate->category_id == $this_post->cate_post_id)
                            <a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">
                            {{$cate->category_name}}</a>
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="hd_left">
                <p class="date_write">
                    <?php
                        use Carbon\Carbon;
                        Carbon::setLocale('en'); // hiển thị ngôn ngữ anh.
                        $dt = Carbon::parse($this_post->created_at);
                        $now = Carbon::now();
                        echo $dt->diffForHumans($now);
                    ?>
                    {{date(', D, d M Y', strtotime($this_post->created_at))}}</p>
            </div>
        </div>
        <hr>
        <div class="social_news">
            <!-- <i class="ti-twitter icons_size dq"></i>
            <i class="ti-facebook icons_size dq"></i>
            <i class="ti-sharethis icons_size dq"></i> -->
            <ion-icon name="logo-twitter"></ion-icon>
            <ion-icon name="logo-facebook"></ion-icon>
            <ion-icon name="share-social-outline"></ion-icon>
        </div>

        <h1 class="news_title">{{$this_post->post_title}}</h1>

        <div class="slide_img">
            <img src="{{asset('public/uploads/post/'.$this_post->post_thumbnail)}}" class="img-fluid rounded-start pd" alt="{{$this_post->post_title}}">
        </div>

        <div class="body_news">
            <p>
                {{print_r($this_post->post_content)}}
            </p>
        </div>
        <div class="reconmend_news">
            <h1 class="re_title">LASTEST NEWS:</h1>

            <!-- Line 2 -->
            <div class="card-columns">
                @php
                    $count = 1;
                @endphp
                @foreach($all_post as $key => $post)
                    <div class="card">
                        <a class="card-group" href="{{URL('/bai-viet/'.$post->post_id)}}">
                        <img class="card-img-top anh_4" src="{{asset('public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$post->post_title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->post_title}}</h5>
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
                    </div>
                    @php
                        $count++;
                    @endphp
                    @if($count>=3)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
        <!-- <div class="keyword">
            <h1 class="rek_title">Tags: </h1>
            <ul class="tag_news">
                <li class="tag_li">U23 Vietnam</li>
                <li class="tag_li">SEA Games</li>
                <li class="tag_li">News</li>
                <li class="tag_li">Park Hang-Seo</li>
                <li class="tag_li">Football</li>
            </ul>
        </div> -->
    </div>
</div>
<script src="{{asset('public/client/js/custom/pages/news/news.js')}}"></script>
<!-- End content news -->
@endsection