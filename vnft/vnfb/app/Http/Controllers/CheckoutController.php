<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;

session_start();

class CheckoutController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $id = Session::get('id');
        if($id) {} else {
            return redirect('/login')->with('message','You must be logged in to continue to the checkout page!');
        }
    }

    public function checkout_show(){

        $this->AuthLogin();

        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();
        //Get id client from session
        $client_id = Session::get('id');

        //Get client data and user's payment data
        $user = DB::table('users')->where('id',$client_id)->first();
        // print_r($user); test data
        $payment = DB::table('payment')->where('user_id',$client_id)->first();
        // print_r($payment); test data

        if($client_id) {
            // echo 'Đã đăng nhập !!';

            Session::put('user',[
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'street_address' => $user->street_address,
                'ward_id' => $user->ward_id,
                'city_id' => $user->city_id,
                'district_id' => $user->district_id,
                'zip_code' => $payment->zip_code,
                'credit_card_name' => $payment->credit_card_name,
                'credit_card_num' => $payment->credit_card_num,
                'exp_month' => $payment->exp_month,
                'exp_year' => $payment->exp_year,
                'cvv_cvc' => $payment->cvv_cvc,
            ]);

            // address
            $city = City::orderby('matp', 'ASC')->get();
            $province = Province::orderby('maqh', 'ASC')->get();
            $wards = Wards::orderby('xaid', 'ASC')->get();

            return view('client.checkout.checkout')->with([
                'category'=> $cate_product,
                'category_post' => $cate_post,
                'partner' => $partner,
                'city' => $city,
                'province' => $province,
                'wards' => $wards,
                ]);
        } else {
            // echo 'Chưa đăng nhập !!';
            return redirect('/client/login')->with('status','Sign in to checkout!');
        }
    }

    public function checkout_handle(Request $request){

        $this->AuthLogin();

        $cate_product = DB::table('categories_product')->where('category_status','1')->orderby('category_id','desc')->get();

        // address
        $city = City::orderby('matp', 'ASC')->get();
        $province = Province::orderby('maqh', 'ASC')->get();
        $wards = Wards::orderby('xaid', 'ASC')->get();

        Session::put('city',$city);
        Session::put('province',$province);
        Session::put('wards',$wards);

        if(session('shipping_id')) {
            return redirect('/payment')->with([
                'category' => $cate_product,
                'shipping_id' => session('shipping_id'),
                'message' => 'Shipping address saved but not paid!',
            ]);
        } else {
                $data = array();
                $data['shipping_name'] = $request->name;
                $data['shipping_phone'] = $request->phone;
                $data['shipping_email'] = $request->email;
                $data['shipping_notes'] = $request->note;
                $data['shipping_address'] = $request->street_address;
                $data['shipping_ward_id'] = $request->wards;
                $data['shipping_district_id'] = $request->province;
                $data['shipping_city_id'] = $request->city;
                $data['shipping_method'] = $request->payment_method;
                $data['shipping_zip_code'] = $request->zip_code;

                Session::put('data',null);
                Session::put('data',$data);

                return redirect('/payment')->with([
                    'category' => $cate_product,
                    'message' => 'Delivery address has been recorded!',
                ]);
            }
    }

    public function payment()
    {

        $this->AuthLogin();

        $cate_product = DB::table('categories_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();
        return view('client.checkout.payment')->with('category',$cate_product)->with('category_post', $cate_post)->with('partner', $partner);
    }

    public function order_place(){

        $this->AuthLogin();

        $data = Session::get('data');
        $data['created_at'] = now();
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);

        $payment_data = array();
        $payment_data['payment_method'] = $data['shipping_method'];
        if($data['shipping_method'] == 2) {
            $payment_data['payment_status'] = 'Chưa thanh toán';
        } else if($data['shipping_method'] == 1 || $data['shipping_method'] == 3){
            $payment_data['payment_status'] = 'Đã thanh toán';
        }
        $payment_data['created_at'] = now();
        $payment_id = DB::table('tbl_payment')->insertGetId($payment_data);

        //get Cart's data
        $cart_qty = count(Session::get('cart'));
        if(Session::get('cart') == true){
            $total = 0;
            foreach(Session::get('cart') as $key => $cart){
                $subtotal = $cart['product_price'] * $cart['product_qty'];
                $total += $subtotal;
            }
        }
            
        $coupon_total = null;
        if (Session::get('coupon')){
            foreach (Session::get('coupon') as $key => $cou){
                if ($cou['coupon_condition'] == 1){
                    $subtotal_coupon = ($total * $cou['coupon_number']) / 100;
                    $total_coupon = $total - $subtotal_coupon;
                    $coupon_total += $subtotal_coupon;
                } else {
                    $total_coupon = ($total - $cou['coupon_number']);
                    $coupon_total += $cou['coupon_number'];
                }
            }
            $cart_total = $total_coupon;
        } else {
            $cart_total = $total;
        }


        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('id');
        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = $cart_total;
        $order_data['order_coupon'] = $coupon_total;
        $order_data['order_status'] = '0';
        $order_data['created_at'] = now();
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        foreach(session('cart') as $cart){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $cart['product_id'];
            $order_d_data['product_name'] = $cart['product_name'];
            $order_d_data['product_price'] = $cart['product_price'];
            $order_d_data['product_sales_quantity'] = $cart['product_qty'];
            $order_d_data['created_at'] = now();
            DB::table('tbl_order_details')->insert($order_d_data);
        }

        Session::forget('cart');
        Session::forget('coupon');
        Session::forget('data');

        if($data['shipping_method'] == 2){
            return redirect('/order-success')->with('message','Order with postpaid payment successful!');
        } else if($data['shipping_method'] == 1 || $data['shipping_method'] == 3){

            return redirect('/order-success');
            } else {
                echo 'Something wrong!';
            }
    }

    public function order_success()
    {
        $cate_product = DB::table('categories_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();

        return view('pages.contact.thankyou')->with('category',$cate_product)->with('category_post', $cate_post)->with('partner', $partner);
    }
}
