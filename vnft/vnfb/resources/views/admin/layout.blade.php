<!doctype html>
<html class="no-js" lang="en">

<head>
    <title>Dashboard | @yield('title')</title>
    @include('admin.zparts.link_head')
</head>

<body id="page-top">

    @include('admin.zparts.sidebar')

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        
        @include('admin.zparts.header')

        <div class="breadcomb-icon">
            <!-- <i class="icon nalika-home"></i> -->
            <i class="material-icons">@yield('head_icon')</i>
        </div>
        <div class="breadcomb-ctn">
            <h2>@yield('heading') </h2>
            <p>Welcome to Viet Nam Team <span class="bread-ntd">Admin</span></p>

        @include('admin.zparts.endheader')

        @yield('admin_content')

    </div>

    @include('admin.zparts.link_foot')
    @include('admin.zparts.footer')

</body>
</html>