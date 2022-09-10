<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\SliderModel;
use App\Models\PartnerModel;
use Carbon\Carbon;
session_start();

class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_id', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        // $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        //->orderBy('product.product_id', 'desc')->get();

        $all_post = DB::table('tbl_post')->where('post_status',1)->orderBy('created_at', 'asc')->take(5)->get();
        $list_product = DB::table('product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();

        $slider = SliderModel::orderby('slider_id', 'desc')->get();
        $partner = PartnerModel::orderby('partner_id', 'desc')->get();

        // $list_match = DB::table('tbl_match')->orderBy('id', 'desc')->get();
        $now = Carbon::now()->toDateTimeString();
        $next_match = DB::table('tbl_match')
            ->join('tbl_tournament', 'tbl_match.tournament_id', '=', 'tbl_tournament.id')
            ->select('tbl_match.*', 'tbl_tournament.tournament_name', 'tbl_tournament.tournament_image')
            ->where('tbl_match.datetime','>=', Carbon::now()->toDateTimeString())
            ->orderBy('datetime','asc')
            ->first();
        $recent_match = DB::table('tbl_match')
            ->join('tbl_tournament', 'tbl_match.tournament_id', '=', 'tbl_tournament.id')
            ->select('tbl_match.*', 'tbl_tournament.tournament_name', 'tbl_tournament.tournament_image')
            ->where('datetime','<', Carbon::now()->toDateTimeString())
            ->orderBy('datetime','desc')->take(2)->get();

        $count = DB::table('tbl_match')->where('datetime','>=', Carbon::now()->toDateTimeString())->count();
        $limit = $count - 1; // the limit
        $future_match = DB::table('tbl_match')
            ->join('tbl_tournament', 'tbl_match.tournament_id', '=', 'tbl_tournament.id')
            ->select('tbl_match.*', 'tbl_tournament.tournament_name', 'tbl_tournament.tournament_image')
            ->where('datetime','>=', Carbon::now()->toDateTimeString())
            ->skip(1)->take(2)->orderBy('datetime','asc')->get();

        $list_team = DB::table('tbl_team')->get();
        $list_tournament = DB::table('tbl_tournament')->orderBy('id','desc')->get();

        return view('pages.home')->with([
            'category' => $cate_product,
            'category_post' => $cate_post,
            'list_product' => $list_product,
            'all_post' => $all_post,
            'slider' => $slider,
            'partner' => $partner,
            'next_match' => $next_match,
            'recent_match' => $recent_match,
            'future_match' => $future_match,
            'list_team' => $list_team,
            'list_tournament' => $list_tournament,
            ]);
    }

    public function search(Request $request) {
        
        $keywords = $request->keyword_submit;
        // SEO
        $meta_desc = "LAPTOP LT - THẾ GIỚI LAPTOP";
        $meta_keywords = "laptop, laptop gaming, macbook, dell, notebook, pc, desktop, desktop computer, cheap laptops, laptop gia re, laptop giá rẻ, laptops for sale, laptop sale, hp, asus, vaio, intel, sony, lg, window, mac os, ";
        $meta_title = "Kết quả tìm kiếm";
        $url_canonical = $request->url();
        // END SEO
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();

        $search_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        ->where('product_name', 'like', '%'.$keywords.'%')->get();

        return view('pages.product.search')->with('category', $cate_product)->with('category_post', $cate_post)->with('search_product', $search_product)
        ->with('meta_desc', $meta_desc)->with('meta_keywords', $meta_keywords)->with('meta_title', $meta_title)->with('url_canonical', $url_canonical)->with('partner', $partner);
    }

    // Banner
    
}