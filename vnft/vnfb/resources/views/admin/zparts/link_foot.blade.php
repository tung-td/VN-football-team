<!-- CUSTOM -->

    <!-- select2
    ============================================ -->
    <script src="{{asset('public/server/js/custom/select2/select2.full.min.js')}}"></script>
    <!-- jquery
    ============================================ -->
    <script src="{{asset('public/server/js/custom/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/bootstrap.min.js')}}"></script>
    <!-- wow JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/wow.min.js')}}"></script>
    <!-- price-slider JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/jquery.scrollUp.min.js')}}"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/metisMenu/metisMenu-active.js')}}"></script>
    <!-- sparkline JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/sparkline/jquery.charts-sparkline.js')}}"></script>
    <!-- calendar JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/calendar/moment.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('public/server/js/custom/calendar/fullcalendar-active.js')}}"></script>
    <!-- float JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('public/server/js/custom/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('public/server/js/custom/flot/curvedLines.js')}}"></script>
    <script src="{{asset('public/server/js/custom/flot/flot-active.js')}}"></script>
    <!-- plugins JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/plugins.js')}}"></script>
    <!-- main JS
    ============================================ -->
    <script src="{{asset('public/server/js/custom/main.js')}}"></script>

<!-- END CUSTOM -->

<!-- Bootstrap core JavaScript-->
<script src="{{asset('public/server/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('public/server/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('public/server/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('public/server/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('public/server/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public/server/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('public/server/js/demo/chart-pie-demo.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('public/server/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/server/vendor/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('public/server/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('public/server/js/demo/datatables-demo.js')}}"></script>

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