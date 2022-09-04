
<!-- custom -->
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <!-- Popper JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <!-- Bootstrap JS -->
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <script src="{{asset('public/client/js/custom/jquery.min.js')}}"></script>
    <script src="{{asset('public/client/js/custom/slick.min.js')}}"></script>
    <script src="{{asset('public/client/js/custom/index.js')}}"></script>
    <script src="{{asset('public/client/js/custom/bootstrap_js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/client/js/custom/videoControl.js')}}"></script>
    <script src="{{asset('public/client/js/custom/timeCountDown.js')}}"></script>
<script src="{{asset('public/client/js/custom/pages/ticket/ticket.js')}}"></script>
    <!-- michalsnik -->
    <script src="{{asset('public/client/custom/aos-master/dist/aos.js')}}"></script>

    <script>
        AOS.init({
            offset: 200,
            duration: 1000
        });
    </script>

    <!-- custom icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- end custom -->

<!-- <script src="{{asset('public/client/js/js.js')}}"></script> -->

<!-- Sweetalert -->
<!-- <script src="{{asset('public/client/js/sweetalert.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script> -->
<!-- Slick sider, slick products and slick partner -->
<script type="text/javascript">
    // ----- Slick Slider -----
    $('.slick-slider').slick({
        dots: true,
        infinite: true,
        speed: 600,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    // ----- Slick Products -----
    $('.slick-product').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }]
    });
    // ----- Slick Partner -----
    $('.slick-partner').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 840,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }]
    });
    $('.slick-new-img').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slick-new-subimg'
    });
    $('.slick-new-subimg').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slick-new-img',
        centerMode: true,
        focusOnSelect: true,
    });
    $('.slick-product-details').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slick-subProduct-details'
    });
    $('.slick-subProduct-details').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slick-product-details',
        centerMode: true,
        focusOnSelect: true,
    });
</script>
<script type="text/javascript">
    $(window).scroll(function(e) {
        var $el = $('.fixedElement');
        var $wrapTop = $('.wrapper-top');
        var $scrollDiv = $('.scroll-div');
        var isPositionFixed = ($el.css('position') == 'fixed');
        if ($(this).scrollTop() > 200 && !isPositionFixed) {
            $el.css({
                'position': 'fixed',
                'top': '0',
                'right': '0',
                'left': '0',
                'z-index': '1000',
                'bacground-color': '#f7ffec',
                'padding-top': '20px'
            });
            $wrapTop.css({
                'display': 'none'
            });
            $scrollDiv.css({
                'display': 'block'
            });
        }
        if ($(this).scrollTop() <
            200 && isPositionFixed) {
            $el.css({
                'position': 'relative',
                'padding-top': '0px'
            });
            $wrapTop.css({
                'display': 'block'
            });
            $scrollDiv.css({
                'display': 'none'
            });
        }
    });
</script>

<!-- Thông báo Cart -->
<script>
    $(document).ready(function() {
        // Show cart Quantity
        show_cart_qty();
        function show_cart_qty() {
            $.ajax({
                url: "{{url('/show-cart-qty')}}",
                method: "GET",
                success:function(data) {
                    $('#show-cart-qty').html(data);
                }
            });
        }
        $('.add-to-cart').click(function() {
            var id= $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            
            $.ajax({
                url: "{{url('/add-to-cart')}}",
                method: 'POST',
                data:{
                    cart_product_id:cart_product_id,
                    cart_product_name:cart_product_name,
                    cart_product_image:cart_product_image,
                    cart_product_price:cart_product_price,
                    cart_product_qty:cart_product_qty,
                    _token:_token
                    
                },
                success:function(data) {
                    // swal({
                    //     title: "Đã thêm vào giỏ hàng",
                    //     text: "Bạn có thể tiếp tục mua sắm hoặc đi đến giỏ hàng để thanh toán",
                    //     showCancelButton: true,
                    //     cancelButtonText: "Trở lại",
                    //     cancelButtonClass: "btn-danger",
                    //     confirmButtonClass: "btn-grape",
                    //     confirmButtonText: "Đi đến giỏ hàng",
                    //     closeOnConfirm: false
                    // },
                    // function() {
                    //     window.location.href = "{{url('/gio-hang')}}";
                    // });
                    show_cart_qty();
                }
            });
        });
    });
</script>
<!-- // phía cuối file layout.blade.php của views -->
<!-- Đánh giá sao -->
<script type="text/javascript">
    function remove_background(product_id)
    {
        for (var count = 1; count <= 5; count++)
        {
            $('#' + product_id + '-' + count).css('color', '#ccc');
        }
    }
    // hover chuột đánh giá sao
    $(document).on('mouseenter', '.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");

        remove_background(product_id);

        for (var count = 1; count <= index; count++)
        {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });
    // thả chuột không đánh giá
    $(document).on('mouseleave', '.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");

        remove_background(product_id);

        for (var count = 1; count <= 5; count++)
        {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });
    // click đánh giá sao
    $(document).on('click', '.rating', function(){
        var index = $(this).data("index");
        var product_id = $(this).data("product_id");
        var _token = $('input[name="_token"]').val();

        $.ajax({
                url: "{{url('/insert-rating')}}",
                method: 'POST',
                data:{index:index, product_id:product_id, _token:_token},
            success:function(data)
            {
                if(data == 'done')
                {
                    alert("Bạn đã đánh giá "+ index +" trên 5");
                }
                else 
                {
                    alert("Lỗi đánh giá");
                }
            }
        });
    });
</script>

<!-- Address -->
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url : '{{url('/select-feeship')}}',
                    method: 'POST',
                    data:{_token:_token},
                    success:function(data){
                        $('#load_delivery').html(data); 
                    }
                });
        }
         
        $(document).on('blur','.fee_feeship_edit',function(){
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url : '{{url('/update-delivery')}}',
                    method: 'POST',
                    data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                    success:function(data){
                        fetch_delivery();
                    }
                });
        })

        $('.add_delivery').click(function(){
            var city = $('.city').val();
            var province = $('.province').val(); 
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, wards:wards, fee_ship:fee_ship, _token:_token},
                success:function(data){
                    fetch_delivery();
                    // alert('Thêm phí vận chuyển thành công');
                }
            });
        });

        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data); 
                }
            });
        });
    })   
       
</script>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="NcecnLXB"></script>