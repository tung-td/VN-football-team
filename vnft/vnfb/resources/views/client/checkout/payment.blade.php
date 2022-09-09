@extends('layout')
@section('content')
<style>
    .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    }

    .row {
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    .back-home {
    height: 40px;
    line-height: 26px;
    border: 1px solid gray;
    color: gray;
    }

    .back-home:hover {
    color: #fff;
    background-color: gray;
    }

    .pay {
        background-color: #51af51;;
        color: #fff;
    }

    .col-sm-12.col-md-7.mb-5 {
        margin-bottom: unset !important;
    }
    .col-sm-12.col-md-4 {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
</style>
<div class="container mb-4">
    <div class="card">
        <div class="table-responsive">
            <div class="row">
                
                <p class="col-md-8" style="color: red; font-size: 14px;">
                <a href="{{url('/')}}" class="btn back-home">Back to shopping</a>
                    <?php
                    use Illuminate\Support\Facades\Session;
                    $message = Session::get('message');
                    if ($message) {
                        echo $message;
                        Session::put('message', null);
                    }
                    ?>
                </p>
                @if(Session::get('cart') == true)
                <div style="text-align: right;" class="col-md-4">
                    
                    <a class="btn btn-danger" href="{{url('/del-all-pro')}}">Clear cart</a>
                </div>
                @endif
            </div>
            <table class="table table-striped">
            <form class="row" action="{{url('/update-cart')}}" method="post">
                    @csrf
                    <thead>
                        <tr>
                            <th scope="col">Product's photo</th>
                            <th scope="col">Product's name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th style="text-align: right;" scope="col">Total</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::get('cart') == true)
                        @php
                            $total = 0;
                        @endphp
                        @foreach(Session::get('cart') as $key => $cart)
                            @php
                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                $total += $subtotal;
                            @endphp
                        <tr>
                            <td>
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">
                                    <img src="{{asset('/public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}" width="50" height="50">
                                </a>
                            </td>
                            <td>
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">
                                    <b>{{$cart['product_name']}}</b>
                                </a>
                            </td>
                            <td>{{number_format($cart['product_price'],0,',','.')}} VNĐ</td>
                            <td style="justify-content: center;">
                                <input style="width: 60px; margin-right: 4px;" class="form-control tex-center cart_quantity"
                                type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                            </td>
                            <td style="text-align: right;">{{number_format($subtotal, 0, ',', '.')}} VNĐ</td>
                            <td class="text-center"><a href="{{url('/del-product/'.$cart['session_id'])}}"><i style="font-size: 24px;" class="text-danger fa fa-trash"></i></a></td>
                        </tr>
                        @endforeach        
                    </tbody>
                        @else
                            <tr>
                                <td class="text-center text-danger" colspan="6"><strong>Cart is empty!</strong></td>
                            </tr>        
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="text-align: center;" colspan="6">
                                <a href="{{url('/')}}" class="btn btn-apple text-white">Let's do some shopping!</a>
                            </td>
                            </tr>
                    </tfoot>
                        @endif

                    @if(Session::get('cart') == true)
                    <tfoot>
                        <tr>
                            <td colspan="3">
                            <strong style="color: red; font-size: 14px;">
                                <?php
                                $message = Session::get('message');
                                if ($message) {
                                    echo $message;
                                    Session::put('message', null);
                                }
                                ?>
                            </strong>
                            </td>
                            <th style="text-align: right;">Total of all:</th>
                            <th style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                            <td class="text-center"><input type="submit" value="Update" name="update_qty" class="btn btn-grape"></td>
                        </tr>
                    </tfoot>
                    @endif
                </form>
            </table>
        </div>
    </div>
    @if(Session::get('cart') == true)
    <div class="card">
        <div class="row">
            <div class="col-sm-12 col-md-7 mb-5">
                <!-- Shipping info -->
                <table class="table table-bordered">
                    <!-- <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        </tr>
                    </thead> -->
                    <?php
                        $data = session('data');
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row">Payment</th>
                            <td>
                                <?php
                                if($data['shipping_method'] == 2) {
                                    echo 'Pay after recieve';
                                } else {
                                    echo 'Pay at the time of ordering';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Recipient's name</th>
                            <td>{{$data['shipping_name']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone number</th>
                            <td>{{$data['shipping_phone']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{$data['shipping_email']}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Delivery address</th>
                            <td>{{$data['shipping_address']}}, 
                                @foreach (session('wards') as $key => $ward)
                                @if($ward->xaid == $data['shipping_ward_id'])
                                    @php
                                    echo $ward->name_xaphuong;
                                    @endphp
                                @endif
                                @endforeach
                                , 
                                @foreach (session('province') as $key => $prov)
                                @if($prov->maqh == $data['shipping_district_id'])
                                    @php
                                    echo $prov->name_quanhuyen;
                                    @endphp
                                @endif
                                @endforeach
                                , 
                                @foreach (session('city') as $key => $ci)
                                @if($ci->maqh == $data['shipping_city_id'])
                                    @php
                                    echo $ci->name_quanhuyen;
                                    @endphp
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Order notes</th>
                            <td>
                                @php
                                if($data['shipping_notes'] == null) {
                                echo '(Không có)';
                                } else echo $data['shipping_notes'];
                                @endphp
                            </td>
                        </tr>
                    </tbody>
                    </table>
            </div>
            <div class="col-md-1"></div>
            <div class="col-sm-12 col-md-4">
                <table>
                    <tr>
                        <th>Total:</th>
                        <th style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                    </tr>
                    @if (Session::get('coupon'))
                        @foreach (Session::get('coupon') as $key => $cou)
                            @if ($cou['coupon_condition']== 1)
                                <tr>
                                    <th>Giảm giá (Giảm {{$cou['coupon_number']}}%):</th>
                                    @php
                                        $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                                        $total_coupon = $total - $subtotal_coupon;
                                    @endphp
                                    <th style="text-align: right;">{{number_format($subtotal_coupon, 0, ',', '.')}} VNĐ</th>
                                </tr>
                            @else
                                <tr>
                                    <th>Giảm giá:</th>
                                    @php
                                        $total_coupon = ($total - $cou['coupon_number']);
                                    @endphp
                                    <th style="text-align: right;">{{number_format($cou['coupon_number'], 0, ',', '.')}} VNĐ</th>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                    <tr>
                        <th class="text-danger text-uppercase">Total of all:&emsp;</th>
                        @if (Session::get('coupon'))
                        <th class="text-danger" style="text-align: right;">{{number_format($total_coupon, 0, ',', '.')}} VNĐ</th>
                        @else
                        <th class="text-danger" style="text-align: right;">{{number_format($total, 0, ',', '.')}} VNĐ</th>
                        @endif
                    </tr>
                    <tr>
                        <th style="text-align: center;" colspan="3" class="mt-2">
                            <hr>
                            @if($data['shipping_method'] == 2)
                                <a href="{{route('order.place')}}" class="btn back-home pay">
                                Purchase Confirmation</a>
                            @else
                                @if($data['shipping_method'] == 3)
                                @if(Session::get('coupon'))
                                    @php
                                    $vnd_to_usd = $total_coupon/23000;
                                    @endphp
                                @else
                                    @php
                                    $vnd_to_usd = $total/23000;
                                    @endphp
                                @endif
                                <div id="paypal-button"></div>
                                <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                @else
                                <a href="{{route('order.place')}}" class="btn back-home pay">
                                Purchase Confirmation</a>
                                @endif
                            @endif
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
   var usd = document.getElementById('vnd_to_usd').value;
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AXFw73NvqsIrku_CExjG163IhMzOoJi2cHxyKsJ5k8lONI1j3tiLXVaeUELjJlSP0u78OPLhRTYn63Zl',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: `${usd}`,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn quý khách đã mua hàng!');
        location.replace("{{route('order.place')}}");
      });
    }
  }, '#paypal-button');

</script>
@endsection