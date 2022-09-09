@extends('layout')
@section('title', 'News')
@section('content')
<!-- Content news -->
<div class="container" style="margin-top: 100px !important;">
    <h1 class="heading_title" >News</h1>

    <!-- Line 1 -->
    <a class="card-group" href="{{URL('/bai-viet/'.$hot_post->post_id)}}">
        <div data-aos="fade-up" data-aos class="card mb-1 cd">
            <div class="row g-0">
                <div class="col-md-7">
                    <img src="{{URL('/public/uploads/post/'.$hot_post->post_thumbnail)}}" class="img-fluid rounded-start pd" alt="{{$hot_post->post_title}}">
                </div>
                <div class="col-md-5">
                    <div class="card-body max-height">
                        <h5 class="card-title">{{$hot_post->post_title}}</h5>
                        <p style="display: block !important;" class="card-text">{{$hot_post->post_meta_desc}}</p>
                        <div class="bottom-text">
                            <p class="card-text"><small class="text-muted">
                                    <?php
                                        use Carbon\Carbon;
                                        Carbon::setLocale('en'); // hiển thị ngôn ngữ anh.
                                        $dt = Carbon::parse($hot_post->created_at);
                                        $now = Carbon::now();
                                        echo $dt->diffForHumans($now);
                                    ?>
                                     | 
                                    @foreach($category_post as $key => $cate)
                                        @if($cate->category_id == $hot_post->cate_post_id)
                                            {{$cate->category_name}}
                                        @endif
                                    @endforeach
                            </small></p>
                            <!-- <i class="ti-new-window icon"></i> -->
                            <i class="material-icons">open_in_new</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- Line 2 -->
    <div class="card-columns">
        <!-- 4 -->
        @foreach($all_post as $key => $post)
            @if($key>=1 && $key<=4)
            <div data-aos="fade-up" data-aos class="card">
                <a class="card-group" href="{{URL('/bai-viet/'.$post->post_id)}}">
                <img class="card-img-top anh_4" src="{{URL('/public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$hot_post->post_title}}">
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
            @endif
        @endforeach
    </div>

    <!-- Line 3 -->
    <div class="card-group">
        <!-- 3 -->
        @foreach($all_post as $key => $post)
            @if($key>=5 && $key<=7)
            <div data-aos="fade-up" data-aos class="card">
                <a class="card-group" href="{{URL('/bai-viet/'.$post->post_id)}}">
                <img class="card-img-top anh_3" src="{{URL('/public/uploads/post/'.$post->post_thumbnail)}}" alt="{{$hot_post->post_title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$hot_post->post_title}}</h5>
                    <p class="card-text">{{$hot_post->post_meta_desc}}</p>
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
            @endif
        @endforeach
    </div>

    <!-- Line 4 -->
    <div class="card-group">
        <!-- 2 -->
        @foreach($all_post as $key => $post)
            @if($key>=8 && $key<=9)
            <div data-aos="fade-up" data-aos class="card mb-3 cs">
                <a class="card-group" href="{{URL('/bai-viet/'.$post->post_id)}}">
                <div class="row g-0">
                    <div class="col-md-7">
                        <img src="{{URL('/public/uploads/post/'.$post->post_thumbnail)}}" class="img-fluid rounded-start cf" alt="{{$hot_post->post_title}}">
                    </div>
                    <div class="col-md-5">
                        <div class="card-body max-height">
                            <h5 class="card-title">{{$hot_post->post_title}}</h5>
                            <p class="card-text">{{$hot_post->post_meta_desc}}</p>
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
                    </div>
                </div>
                </a>
            </div>
            @endif
        @endforeach
    </div>
</div>

<!-- End content news -->
@endsection