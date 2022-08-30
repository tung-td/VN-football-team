<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class PlayerController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function add_player() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.player.add_player');
    }

    public function list_player() {
        $this->AuthLogin();
        $list_player = DB::table('tbl_player')->orderBy('player_id', 'desc')->get();
        $manager_player = view('admin.player.list_player')->with('list_player', $list_player);
        // echo '<pre>';
        // print_r($list_player);
        // echo '</pre>';
        return view('admin.layout')->with('admin.player.list_player', $manager_player);
    }

    public function save_player(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['player_name'] = $request->player_name;
        $data['player_shirt_num'] = $request->player_shirt_num;
        $data['player_squad'] = $request->player_squad;
        $data['player_position'] = $request->player_position;
        $data['player_birth'] = $request->player_birth;
        $data['player_club'] = $request->player_club;
        $data['player_gender'] = $request->player_gender;
        if($request->player_status == 'unlocked') {
            $data['player_status'] = 0;
        } else {
            $data['player_status'] = 1;
        }
        $get_image = $request->file('player_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/player', $new_image);
            $data['player_image'] = $new_image;
            DB::table('tbl_player')->insert($data);
            Session::put('message', 'Add player successfully!');
            return redirect('list-player');
        }
        $data['player_image'] = '';
        DB::table('tbl_player')->insert($data);
        Session::put('message', 'Add player successfully!');
        return redirect('list-player');
    }

    public function vnsquad() {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        // $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        //->orderBy('product.product_id', 'desc')->get();

        $list_product = DB::table('product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();
        $partner = DB::table('tbl_partner')->get();
        $slider = DB::table('tbl_slider')->get();

        return view('pages.vnsquad.vnsquad')->with('category', $cate_product)->with('category_post', $cate_post)->with('list_product', $list_product)->with('partner', $partner)->with('slider', $slider);
    }

    public function squad($squad_id) {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $partner = DB::table('tbl_partner')->get();
        $slider = DB::table('tbl_slider')->get();

        $squad_by_id = DB::table('tbl_player')->where('player_squad', $squad_id)->get();
        switch ($squad_id) {
            case '1':
                $squad_name = "Men";
                break;
            case '2':
                $squad_name = "Women";
                break;
            case '3':
                $squad_name = "Youngs";
                break;
            case '4':
                $squad_name = "Legends";
                break;
            default:
                # code...
                break;
        }
        return view('pages.vnsquad.squad')->with('category', $cate_product)->with('squad_by_id', $squad_by_id)->with('category_post', $cate_post)->with('partner', $partner)->with('squad_name', $squad_name)->with('slider', $slider)->with('squad_id', $squad_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
