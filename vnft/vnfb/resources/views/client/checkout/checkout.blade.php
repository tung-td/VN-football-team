@extends('layout')
@section('content')

<?php
  use Illuminate\Support\Facades\Session;
  $user = Session::get('user');
  $name = $user['name'];
  $email = $user['email'];
  $phone = $user['phone'];
  $street_address = $user['street_address'];
  $ward_id = $user['ward_id'];
  $city_id = $user['city_id'];
  $district_id = $user['district_id'];
  $zip_code = $user['zip_code'];
  $credit_card_name = $user['credit_card_name'];
  $credit_card_num = $user['credit_card_num'];
  $exp_month = $user['exp_month'];
  $exp_year = $user['exp_year'];
  $cvv_cvc = $user['cvv_cvc'];
?>

<div class=" checkout row">
  <div class=" checkout col-75">
    <div class="card">
      <form action="{{route('checkout.handle')}}" method="post"  class="row g-3 needs-validation" novalidate>
        @csrf
        <div class=" checkout row">
          <div class=" checkout col-50">
            <h3>Payment address</h3><hr>

            <div class="col-md-12">
              <label for="fname"><i class=" checkout fa fa-user"></i> Full name</label>
              <input class="form-control" type="text" id="fname" name="name" value="{{$name}}" placeholder="Nguyễn Văn A" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="email"><i class=" checkout fa fa-envelope"></i> Email</label>
              <input class="form-control" type="text" id="email" name="email" value="{{$email}}" placeholder="nguyenvana@gmail.com" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            
            <div class="col-md-12">
              <label for="phone"><i class=" checkout fa fa-phone"></i> Phone number</label>
              <input class="form-control" type="num" id="phone" name="phone" value="{{$phone}}" placeholder="0123456789" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="adr"><i class=" checkout fa fa-address-card-o"></i> Delivery address</label>
              <input class="form-control" type="text" id="adr" name="street_address" value="{{$street_address}}"  placeholder="470 Đường Trần Đại Nghĩa" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-5">
              <label for="city"><i class=" checkout fa fa-institution"></i> City</label>
              <select id="city" name="city" class="form-control form-control-sm choose city" style="height: 50px;" required>
                    <!-- <option value="">---Chọn tỉnh/thành phố---</option> -->
                    @if($city_id == null)
                      <option value="">---Choose city---</option>
                    @endif
                    @foreach ($city as $key => $ci)
                        @if($ci->matp == $city_id)
                        <option value="{{ $ci->matp }}" selected>{{ $ci->name_city }}</option>
                        @else
                        <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                        @endif
                    @endforeach
              </select>
              <div class="invalid-feedback">
                Please choose a valid city.
              </div>
            </div>

            <div class="col-md-5">
            <label for="province">Choose local</label>
                <select id="province" name="province" class="form-control form-control-sm choose province" style="height: 50px;" required>
                    <!-- <option value="">---Chọn quận/huyện---</option> -->
                    <option value="{{$district_id}}">
                    @if($district_id)
                      @foreach ($province as $key => $prov)
                        @if($prov->maqh == $district_id)
                          @php
                            echo $prov->name_quanhuyen;
                          @endphp
                        @endif
                      @endforeach
                    @else
                    ---Choose local---
                    @endif
                    </option>
                </select>
              <div class="invalid-feedback">
                Please choose a valid local.
              </div>
            </div>
            
            <div class="col-md-5">
              <label for="wards">Choose wards</label>
              <select id="wards" name="wards" class="form-control form-control-sm wards" style="height: 50px;" required>
                    <!-- <option value="">---Chọn xã/phường---</option> -->
                    <option value="{{$ward_id}}">
                    @if($ward_id)
                      @foreach ($wards as $key => $ward)
                        @if($ward->xaid == $ward_id)
                          @php
                          echo $ward->name_xaphuong;
                          @endphp
                        @endif
                      @endforeach
                    @else
                    ---Choose wards---
                    @endif
                    </option>
              </select>
              <div class="invalid-feedback">
                Please choose a valid wards.
              </div>
            </div>

            <div class="col-md-5">
              <label for="zip">Zip code</label>
              <input class="form-control" type="text" id="zip" name="zip_code" value="{{$zip_code}}" placeholder="550000" required>
              <div class="invalid-feedback">
                Please provide a valid zip code.
              </div>
            </div>

          </div>

          <div class=" checkout col-50">
            <h3>Payment methods</h3><hr>
            <div class="row">
              <div class="col-md-4">
                <input type="radio" name="payment_method" value="1" onclick="selectPayment1();" required /> Credit Card
              </div>
              <div class="col-md-3">
                <input type="radio" name="payment_method" value="2" onclick="selectPayment2();" required /> Cash
              </div>
              <div class="col-md-5">
                <input type="radio" name="payment_method" value="3" onclick="selectPayment3();" required /> Payment Grade
              </div>
            </div>
            <div id="div0">
              <b style="color: red;">Haven't selected a payment method</b>
            </div>
            <div id="div1" style="display: none;">
              <b style="color: green;">Selected to pay by CREDIT CARD</b>
              <hr>
              <!-- <label for="fname">Permitted type</label>
              <div class=" checkout icon-container">
                <i class=" checkout fa fa-cc-visa" style="color:navy;"></i>
                <i class=" checkout fa fa-cc-amex" style="color:blue;"></i>
                <i class=" checkout fa fa-cc-mastercard" style="color:red;"></i>
                <i class=" checkout fa fa-cc-discover" style="color:orange;"></i>
              </div> -->
              <div class="col-md-12">
                <label for="cname">Name card</label>
                <input class="form-control" type="text" id="cname" name="credit_card_name" value="{{$credit_card_name}}" placeholder="NGUYEN VAN A" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-12">
                <label for="ccnum">Credit card number</label>
                <input class="form-control" type="text" id="ccnum" name="credit_card_num" value="{{$credit_card_num}}" placeholder="1111-2222-3333-4444" required>
                <div class="invalid-feedback">
                  Please provide a valid card number.
                </div>
              </div>

              <div class="col-md-5">
                <label class="cvv_cvc" for="expmonth">Expiration month</label>
                <input class="form-control" type="text" id="expmonth" name="exp_month" value="{{$exp_month}}" placeholder="Tháng 9" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-5">
                <label class="cvv_cvc" for="expyear">Expiration year</label>
                <input class="form-control" type="text" id="expyear" name="exp_year" value="{{$exp_year}}" placeholder="2021" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-12">
                <label class="cvv_cvc" for="cvv_cvc">Verification CVV code</label>
                <input class="form-control" type="text" id="cvv_cvc" name="cvv_cvc" value="{{$cvv_cvc}}" placeholder="352" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

            </div>
            <div id="div2" style="display: none;">
              <b>Opening Soon!</b>
              <hr>
            </div>
            <div id="div3" style="display: none;">
              <b>Opening Soon!</b>
              <hr>
            </div>

            <div class="col-md-12">
              <label for="note">Order Notes</label>
              <textarea id="note" name="note" rows="4" placeholder="Message..."></textarea> 
            </div>

          </div>
          
        </div>
        <label class="check-pnt">
          <input class="check-btn" type="checkbox" required> 
          <span>Agree to terms and conditions</span>
        </label>
        <input type="submit" value="Pay" class="col-2 checkout btn btn-grape">
      </form>
    </div>
  </div>
  <div class=" checkout col-25">

    <div class="card">
      <div class="card-body">
        <h4 class="cart-title">Cart <span class=" checkout price" style="color:black"><i class=" checkout fa fa-shopping-cart"></i> </span></h4>

        @if(session('cart') == true)
            @php
                $total = 0;
                $count = 0;
            @endphp
            @foreach(session('cart') as $key => $cart)
                @php
                    $subtotal = $cart['product_price'] * $cart['product_qty'];
                    $total += $subtotal;
                    $count += 1;
                @endphp
                <p><a href="{{URL::to('/chi-tiet-san-pham/'.$cart['product_id'])}}">{{$cart['product_name']}}</a> x {{$cart['product_qty']}} <span class=" checkout price">{{number_format($cart['product_qty'] * $cart['product_price'])}} VNĐ</span></p>
            @endforeach
        @else
            <hr><p class="text-center"><b>Cart is empty</b></p>
        @endif
        <hr>
        <p>Quantity of products: <span class=" checkout price" style="color:black">
            <b>{{$count}}</b></span></p>
        <hr>
        <p>Total: <span class=" checkout price" style="color:black"><b>{{number_format($total)}} VNĐ</b></span></p>
        <hr>
        @if (Session::get('coupon'))
          @foreach (Session::get('coupon') as $key => $cou)
              @if ($cou['coupon_condition']== 1)
                  <p>Discount ({{$cou['coupon_number']}}%): 
                    <span class=" checkout price" style="color:black">
                      <b>
                      @php
                          $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                          $total_coupon = $total - $subtotal_coupon;
                      @endphp
                      {{number_format($subtotal_coupon)}} VNĐ
                      </b></span>
                  </p>
              @else
                  <p>Discount: <span class=" checkout price" style="color:black"><b>
                      @php
                          $total_coupon = ($total - $cou['coupon_number']);
                      @endphp
                      {{number_format($cou['coupon_number'])}} VNĐ
                      </b></span>
                  </p>
              @endif
          @endforeach
          <hr>
        @endif
        <p>Total of all: <span class=" checkout price" style="color:red"><b>
          @if (Session::get('coupon'))
            {{number_format($total_coupon)}} VNĐ
          @else
            {{number_format($total)}} VNĐ
          @endif
          </b></span></p>
    </div>

      
       
    </div>
  </div>
</div>

<style>
body.checkout {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

*.checkout {
  box-sizing: border-box;
}

.row.checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 10px;
}

.col-25.checkout {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
}

.col-50.checkout {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
}

.col-75 > .card:hover {
  box-shadow: 2px 2px 15px #fd9a6ce5;
  transform: unset !important;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container.checkout {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=num],textarea {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-top: 20px;
  margin-bottom: 10px;
  display: block;
  font-weight: 700;
}

.icon-container.checkout {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn.checkout {
  color: white;
  background-color: #dc3545;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout.btn:hover {
  background-color: #999;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .checkout.row {
    flex-direction: column-reverse;
    margin-top: 70px;
  }

  .checkout.col-75 {
    padding: unset;
  }
  .checkout.col-25 {
    margin-bottom: 20px;
    padding: unset;
  }
  .col-50.checkout {
    flex: unset;
  }
  .col-md-5 {
    max-width: 100% !important;
  }
}

.col-md-12 {
  margin-bottom: 20px !important;
  max-width: 99%;
  text-align: left;
}

.col-md-5 {
  display: inline-block;
  max-width: 49%;
  margin-bottom: 20px !important;
  text-align: left;
}

.cart-title {
  font-weight: 700;
}

#div0, 
#div1 {
  font-weight: 700;
  text-align: center;
}

h3 {
  font-weight: 700;
  margin-top: 20px;
  text-align: center;
}

.cvv_cvc {
  margin: unset;
  margin-top: 9px;
}

.check-pnt {
  padding: 0px 45px;
  margin: unset;
  display: flex;
  align-items: center;
}

.check-btn {
  height: 18px;
    display: inline-block;
    width: 19px;
    margin-right: 10px;
}

#div2,
#div3 {
  text-align: center;
  font-weight: 700;
}

#div2 > b,
#div3 > b{
  color: red;
}

.card {
  margin-top: 80px;
}

</style>

<!-- Function select Payment way -->
<script type="text/javascript">
function selectPayment1(){
  document.getElementById('div1').style.display ='block';
  document.getElementById('div2').style.display ='none';
  document.getElementById('div3').style.display = 'none';
  document.getElementById('div0').style.display ='none';
}
function selectPayment2(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display = 'block';
  document.getElementById('div3').style.display = 'none';
  document.getElementById('div0').style.display ='none';
}
function selectPayment3(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('div2').style.display = 'none';
  document.getElementById('div3').style.display = 'block';
  document.getElementById('div0').style.display ='none';
}
</script>

<script>
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
@endsection