<!-- CUSTOM -->
<form action="{{URL('/tim-kiem')}}" method="get" id="searchform">
    {{csrf_field()}}
    <div id="search-display" class="search-button">
        <div class="home-search__panel">
                <div class="text-area">
                    <input type="text" name="keyword_submit" id="input-search" placeholder="What are you looking for?">
                </div>
                <div class="sp-btn">
                    <a href="#"onclick="document.getElementById('searchform').submit()" role="button">
                        <span>Search</span>
                    </a>
                </div>
                <div class="close-search" role="button" onclick="closeSearch()">
                    <!-- <i class="ti-close"></i> -->
                    <i class="material-icons">close</i>
                </div>
        </div>
    </div>
</form>

<div id="header">
    <div class="header-logo">
        <a href="{{URL('/')}}">
            <img src="{{URL('public/client/img/custom/img2/logo/LogoVN.webp')}}" alt="Logo VNFT">
        </a>
    </div>

    <ul id="nav">
        <li>
            <a href="{{route('vnsquad')}}">
                <span>VN Squad</span>
            </a>
            <ul class="subnav" style="padding-left:72px;">
                <li><a href="{{URL('/squad/1')}}">Men</a></li>
                <li><a href="{{URL('/squad/2')}}">Women</a></li>
                <li><a href="{{URL('/squad/3')}}">Youngs</a></li>
                <li><a href="{{URL('/squad/4')}}">Legends</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('news')}}">News</a>
            <ul class="subnav" style="padding-left:72px;">
                @foreach($category_post as $key => $cate)
                <li><a href="{{URL('/danh-muc-bai-viet/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{route('product.show')}}">Shop</a>
            <ul class="subnav" style="padding-left:72px;">
                @foreach($category as $key => $cate)
                <li><a href="{{URL('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{route('match')}}">Tickets</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>

    </ul>

    <div class="header-options">
        <div class="search-btn">
            <!-- <i class="search-icon ti-search" onclick="openSearch()"></i> -->
            <i class="material-icons" onclick="openSearch()">search</i>
        </div>

        <div class="help-btn">
            <!-- <i class="help-icon ti-help-alt" href="#questionModal" data-dismiss="modal" data-toggle="modal"></i> -->
            <i class="material-icons" href="#questionModal" data-dismiss="modal" data-toggle="modal">help</i>
        </div>

        @if(session('name'))
        <div class="header-sign" data-toggle="modal" data-target="#userModal">
            <!-- <i class="sign-items fa fa-user-o"></i> -->
            <i class="sign-items">{{session('name')}}</i>
        </div>
        @else
        <div class="header-sign" data-toggle="modal" data-target="#loginModal">
            <!-- <i class="sign-items fa fa-user-o"></i> -->
            <i class="sign-items material-icons">account_circle</i>
        </div>
        @endif

        @if(Session::get('cart') == true)
        <div id="show-cart-qty" class="header-cart">
            <i class="sign-items material-icons">shopping_cart</i>
        </div>
        @else
        <div id="show-cart-qty" class="header-cart">
            <a href="{{route('cart.show')}}">
                <span class="num-cart">0</span>
                <i class="sign-items material-icons">shopping_cart</i>
            </a>
        </div>
        @endif

        <div id="mobile-menu" class="mobile-menu-btn">
            <!-- <i class="menu-icon ti-menu"></i> -->
            <i class="material-icons">menu</i>
            <div class="subnav">
                <li><a href="{{route('vnsquad')}}">VN Squad</a></li>
                <li><a href="{{route('news')}}">News</a></li>
                <li><a href="{{route('product.show')}}">Shop</a></li>
                <li><a href="{{route('match')}}">Tickets</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </div>
        </div>
    </div>
</div>
<!-- END CUSTOM -->

<!-- Begin Header -->
<header class="mb-3 ">
    <!-- Begin Header PC -->
        <!-- <div class="wrapper-top py-1">
            <div class="container">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 fixedElement" style=" background-color: #f7ffec;">
                <nav class="container nav-pc">
                    <div class="row">
                        <div class="navbar col-md-12">
                            <ul class="nav">
                                <li class="nav-item">
                                    <div class="scroll-div" style="display: none;">
                                        <a href="{{URL('/')}}" title="Laptop LT - Thế giới công nghệ">
                                            <img src="{{URL('public/client/img/logo-image.png')}}" alt="Laptop LT - Thế giới công nghệ" height="40">
                                        </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{URL('/')}}"><i class="fas fa-home-alt"></i></a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{route('introduce')}}">Giới thiệu</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/laptoplt/">Fanpage</a></li>
                                @if(session('name'))
                                    <li class="nav-item dropdown subnav-item">
                                        <a class="nav-link" href="" onclick="return false;">{{session('name')}}</a>
                                        <ul class="dropdown-menu subnav">
                                            <li class="dropdown-item"><a href="{{route('client.info')}}">Thông tin</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="{{route('client.update')}}">Cập nhật</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="{{route('client.logout')}}">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="nav-item dropdown subnav-item">
                                        <a class="nav-link" href="" onclick="return false;">Tài khoản</a>
                                        <ul class="dropdown-menu subnav">
                                            <li class="dropdown-item"><a href="{{route('client.login')}}">Đăng nhập</a></li>
                                            <li class="dropdown-divider"></li>
                                            <li class="dropdown-item"><a href="{{route('client.register')}}">Đăng ký</a></li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div> -->
    <!-- End Header PC -->
</header>
<!-- End Header -->