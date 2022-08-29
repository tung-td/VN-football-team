<!DOCTYPE html>
<html lang="en">
<head>
    <title>VNFT | @yield('title')</title>
    @include('parts.link_head')
</head>
<body>
    <?php
        use Illuminate\Support\Facades\Session;
        //dùng cho back về url đang làm việc sau khi login,register
        Session::put('back_url', request()->fullUrl());
    ?>
    
    <!-- BODY -->
    <div id="main" class="max-width: 100%;">

        <!-- Start Header -->
        @include('parts.header')
        <!-- End Header -->

        @yield('content')

        <!-- Start Footer -->
        @include('parts.footer')
        <!-- End Footer -->

    </div>

        @include('parts.modal')

        @include('parts.link_foot')
</body>
</html>