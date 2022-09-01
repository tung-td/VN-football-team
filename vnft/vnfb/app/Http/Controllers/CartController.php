<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Models\Coupon;
session_start();

class CartController extends Controller {
    
    public function show_cart_qty() {
        $cart = count(Session::get('cart'));
        $output = '';
        $output.= '<a href="'.route('cart.show').'">
                        <span style="
                            position: absolute; top: 15px; right: 15px; background: #f00; color: #fff; padding: 2px 2px; line-height: 1; border-radius: 5px; font-size: 11px;" 
                            class="num-cart">'.$cart.'</span>
                        <i class="sign-items material-icons">shopping_cart</i>
                    </a>';
        echo $output;
    }

    public function show_cart(Request $request) {
        $meta_desc = "Cart";
        $meta_keywords = "Cart";
        $meta_title = "Cart";
        $url_canonical = $request->url();

        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();
        // print_r(session('cart'));
        
        return view('pages.cart.show_cart')->with('category', $cate_product)->with('category_post', $cate_post)->with('partner',$partner)->with('meta_desc', $meta_desc)
        ->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical);
    }

    public function add_to_cart(Request $request) {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if ($cart==true) {
            $is_available = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_available++;
                    $cart[$key] = array(
                    'session_id' => $val['session_id'],
                    'product_name' => $val['product_name'],
                    'product_id' => $val['product_id'],
                    'product_image' => $val['product_image'],
                    'product_qty' => $val['product_qty']+ $data['cart_product_qty'],
                    'product_price' => $val['product_price'],
                    );
                    Session::put('cart', $cart);
                }

            }
            if ($is_available == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }

    public function del_product($session_id) {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Delete successful!');
        } else {
            return redirect()->back()->with('message', 'Delete fail!');
        }
    }

    public function update_cart(Request $request) {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $val) {
                    if ($val['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Update successful!');
        } else {
            return redirect()->back()->with('message', 'Update fail!');
        }
    }

    public function del_all_pro() {
        $cart = Session::get('cart');
        if ($cart == true) {
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Clear cart successful!');
        }
    }

    public function check_coupon(Request $request) {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon>0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_available = 0;
                    if ($is_available == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return redirect()->back()->with('message', 'Add coupon successful');
            }
        } else {
            return redirect()->back()->with('message', 'Add coupon fail');
        }
    }
}