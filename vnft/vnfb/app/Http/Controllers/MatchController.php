<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class MatchController extends Controller
{
    public function AuthLogin() { //Kiểm tra đăng nhập Admin
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }
    }

    public function match() {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        // $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        //->orderBy('product.product_id', 'desc')->get();

        $list_product = DB::table('product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();
        $partner = DB::table('tbl_partner')->get();
        $slider = DB::table('tbl_slider')->get();

        $list_match = DB::table('tbl_match')->orderBy('id', 'desc')->get();

        return view('pages.match.match')->with([
                'category' => $cate_product,
                'category_post' => $cate_post,
                'list_product' => $list_product,
                'partner' => $partner,
                'slider' => $slider
            ]);
    }

    public function ticket() {
        $cate_product = DB::table('categories_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')->where('category_status', '1')->orderBy('category_name', 'asc')->get();

        // $list_product = DB::table('product')->join('categories_product','categories_product.category_id','=','product.category_id')
        //->orderBy('product.product_id', 'desc')->get();

        $list_product = DB::table('product')->where('product_status', '1')->orderBy('product_id', 'desc')->get();
        $partner = DB::table('tbl_partner')->get();
        $slider = DB::table('tbl_slider')->get();

        return view('pages.ticket.ticket')->with('category', $cate_product)->with('category_post', $cate_post)->with('list_product', $list_product)->with('partner', $partner)->with('slider', $slider);
    }

    // === DASHBOARD ===

    // Team
    public function add_team() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.team.add_team');
    }

    public function showTeaminSquad(Request $request)
	{
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="squad") {
                $select_team = DB::table('tbl_team')->where('squad',$data['squad'])->get();
                $output.= '<option> --- Select Team A --- </option>';
                foreach($select_team as $key => $team){
                    $output.= '<option value=" '.$team->id.' ">'.$team->team_name.'</option>';
                }
            } else {
                $select_team = DB::table('tbl_team')->where('squad',$data['squad'])->where('id','!=',$data['teamA'])->get();
                $output.= '<option> --- Select Team B --- </option>';
                foreach($select_team as $key => $team){
                    $output.= '<option value=" '.$team->id.' ">'.$team->team_name.'</option>';
                }
            }
        }
        echo $output;
	}

    public function list_team() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $list_team = DB::table('tbl_team')->orderBy('id', 'desc')->get();
        $manager_team = view('admin.team.list_team')->with('list_team', $list_team);
        // echo '<pre>';
        // print_r($list_team);
        // echo '</pre>';
        return view('admin.layout')->with('admin.team.list_team', $manager_team);
    }

    public function save_team(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['team_name'] = $request->team_name;
        $data['squad'] = $request->squad;
        $get_image = $request->file('team_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/team', $new_image);
            $data['team_image'] = $new_image;
            DB::table('tbl_team')->insert($data);
            Session::put('message', 'Add team successfully!');
            return redirect()->route('team.list');
        }
        $data['team_image'] = '';
        DB::table('tbl_team')->insert($data);
        Session::put('message', 'Add team successfully!');
        return redirect()->route('team.list');
    }

    // Tournament
    public function add_tournament() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        return view('admin.tournament.add_tournament');
    }

    public function list_tournament() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $list_tournament = DB::table('tbl_tournament')->orderBy('id', 'desc')->get();
        $manager_tournament = view('admin.tournament.list_tournament')->with('list_tournament', $list_tournament);
        // echo '<pre>';
        // print_r($list_tournament);
        // echo '</pre>';
        return view('admin.layout')->with('admin.tournament.list_tournament', $manager_tournament);
    }

    public function save_tournament(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['tournament_name'] = $request->tournament_name;
        $data['status'] = $request->tournament_status;
        $get_image = $request->file('tournament_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/tournament', $new_image);
            $data['tournament_image'] = $new_image;
            DB::table('tbl_tournament')->insert($data);
            Session::put('message', 'Add tournament successfully!');
            return redirect()->route('tournament.list');
        }
        $data['tournament_image'] = '';
        DB::table('tbl_tournament')->insert($data);
        Session::put('message', 'Add tournament successfully!');
        return redirect()->route('tournament.list');
    }

    // Match
    public function add_match() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $tournaments = DB::table('tbl_tournament')->orderBy('id','asc')->get();
        return view('admin.match.add_match')->with('tournaments', $tournaments);
    }

    public function list_match() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $list_match = DB::table('tbl_match')
            ->join('tbl_tournament', 'tbl_match.tournament_id', '=', 'tbl_tournament.id')
            ->select('tbl_match.*', 'tbl_tournament.tournament_name')
            ->orderBy('tbl_match.id', 'desc')->get();

        // $list_tournament = DB::table('tbl_tournament')->orderBy('id', 'desc')->get();
        $list_team = DB::table('tbl_team')->orderBy('id', 'desc')->get();

        $manager_match = view('admin.match.list_match')->with([
                'list_match' => $list_match,
                // 'list_tournament' => $list_tournament,
                'list_team' => $list_team,
            ]);
        // echo '<pre>';
        // print_r($list_match);
        // echo '</pre>';
        return view('admin.layout')->with('admin.match.list_match', $manager_match);
    }

    public function save_match(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['tournament_id'] = $request->tournament;
        $data['squad'] = $request->squad;
        $data['teamA_id'] = $request->teamA;
        $data['teamB_id'] = $request->teamB;
        $data['stadium'] = $request->stadium;
        $data['type'] = $request->type;
        $data['datetime'] = $request->datetime;
        $data['ticket'] = $request->ticket;
        $get_image = $request->file('stadium_background');

        if($data['ticket'] == 1) {
            
        }

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/match', $new_image);
            $data['stadium_background'] = $new_image;
            DB::table('tbl_match')->insert($data);
            Session::put('message', 'Add match successfully!');
            return redirect()->route('match.list');
        }
        $data['stadium_background'] = '';
        DB::table('tbl_match')->insert($data);
        Session::put('message', 'Add match successfully!');
        return redirect()->route('match.list');
    }
}
