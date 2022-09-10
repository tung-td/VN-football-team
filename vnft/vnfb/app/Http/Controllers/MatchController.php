<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
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
        $cate_product = DB::table('categories_product')
            ->where('category_status', '1')
            ->orderBy('category_name', 'asc')->get();
        $cate_post = DB::table('categories_post')
            ->where('category_status', '1')
            ->orderBy('category_name', 'asc')->get();

        $partner = DB::table('tbl_partner')->get();
        $slider = DB::table('tbl_slider')->get();

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
            ->skip(1)->take($limit)->orderBy('datetime','asc')->get();

        $list_team = DB::table('tbl_team')->get();
        $list_tournament = DB::table('tbl_tournament')->orderBy('id','desc')->get();

        return view('pages.match.match')->with([
                'category' => $cate_product,
                'category_post' => $cate_post,
                'partner' => $partner,
                'slider' => $slider,
                'next_match' => $next_match,
                'recent_match' => $recent_match,
                'future_match' => $future_match,
                'list_team' => $list_team,
                'list_tournament' => $list_tournament,
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

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/match', $new_image);
            $data['stadium_background'] = $new_image;
        } else {
            $data['stadium_background'] = '';
        }
        $match_id = DB::table('tbl_match')->insertGetId($data);
        Session::put('message', 'Add match successfully!');

        if($data['ticket'] == 1) {
            $ticket_price = array();
            $ticket_price['match_id'] = $match_id;
            $ticket_price['class1'] = $request->class1;
            $ticket_price['class2'] = $request->class2;
            $ticket_price['class3'] = $request->class3;
            $ticket_price['class4'] = $request->class4;
            $ticket_price_id = DB::table('tbl_ticketprice')->insertGetId($ticket_price);

            $ticket = array();
            $ticket['match_id'] = $match_id;
            $ticket['ticket_price_id'] = $ticket_price_id;
            $ticket['status'] = 1;

            $stands = array("A","B","C","D");
            $seat_chars = array("A","B","C","D","E","F","G","H","I","J");
            foreach ($stands as $key => $stand) {
                $ticket['stand'] = $stand;
                if ($stand == "A" || $stand == "B" ) {
                    $stairs = array(2,5);
                    foreach ($stairs as $key => $stair) {
                        if ($stair == 2) {
                            $ticket['stair'] = $stair;
                            for($i = 1; $i<=10; $i++) {
                                $ticket['door'] = $i;
                                if($i<=6) {
                                    $ticket['class'] = 4;
                                    if ($ticket['stand'] == "A") {
                                        if($i<=2) {
                                            foreach ($seat_chars as $key => $seat_char) {
                                                $ticket['seat_char'] = $seat_char;
                                                for ($j=1; $j <= 14; $j++) { 
                                                    if($key>=7 && $key<=10) {
                                                        $ticket['seat_num'] = $j;
                                                        DB::table('tbl_ticket')->insert($ticket);
                                                    }
                                                }
                                            }
                                        } else {
                                            foreach ($seat_chars as $key => $seat_char) {
                                                $ticket['seat_char'] = $seat_char;
                                                for ($j=1; $j <= 14; $j++) { 
                                                    if($key>=5 && $key<=10) {
                                                        if ($key<=7) {
                                                            if($j<6 || $j>9) {
                                                                $ticket['seat_num'] = $j;
                                                                DB::table('tbl_ticket')->insert($ticket);
                                                            }
                                                        } else {
                                                            $ticket['seat_num'] = $j;
                                                            DB::table('tbl_ticket')->insert($ticket);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        foreach ($seat_chars as $key => $seat_char) {
                                            $ticket['seat_char'] = $seat_char;
                                            for ($j=1; $j <= 14; $j++) { 
                                                if($key>=3 && $key<=6) {
                                                    if($j<6 || $j>9) {
                                                        $ticket['seat_num'] = $j;
                                                        DB::table('tbl_ticket')->insert($ticket);
                                                    }
                                                } else {
                                                    $ticket['seat_num'] = $j;
                                                    DB::table('tbl_ticket')->insert($ticket);
                                                }
                                            }
                                        }
                                    }
                                } elseif ($i>6) {
                                    $ticket['class'] = 3;
                                    foreach ($seat_chars as $key => $seat_char) {
                                        $ticket['seat_char'] = $seat_char;
                                        for ($j=1; $j <= 14; $j++) { 
                                            if($key>=3 && $key<=6) {
                                                if($j<6 || $j>9) {
                                                    $ticket['seat_num'] = $j;
                                                    DB::table('tbl_ticket')->insert($ticket);
                                                }
                                            } else {
                                                $ticket['seat_num'] = $j;
                                                DB::table('tbl_ticket')->insert($ticket);
                                            }
                                        }
                                    }
                                    
                                } elseif ($i>8) {
                                    $ticket['class'] = 2;
                                    foreach ($seat_chars as $key => $seat_char) {
                                        $ticket['seat_char'] = $seat_char;
                                        for ($j=1; $j <= 14; $j++) { 
                                            if($key>=3 && $key<=6) {
                                                if($j<6 || $j>9) {
                                                    $ticket['seat_num'] = $j;
                                                    DB::table('tbl_ticket')->insert($ticket);
                                                }
                                            } else {
                                                $ticket['seat_num'] = $j;
                                                DB::table('tbl_ticket')->insert($ticket);
                                            }
                                        }
                                    }
                                }
                            }
                        } else if ($stair == 5) {
                            $ticket['stair'] = $stair;
                            for($i = 1; $i<=8; $i++) {
                                $ticket['door'] = $i;
                                if($i<=4) {
                                    $ticket['class'] = 3;
                                    foreach ($seat_chars as $key => $seat_char) {
                                        $ticket['seat_char'] = $seat_char;
                                        for ($j=1; $j <= 14; $j++) { 
                                            if($key>=3 && $key<=6) {
                                                if($j<6 || $j>9) {
                                                    $ticket['seat_num'] = $j;
                                                    DB::table('tbl_ticket')->insert($ticket);
                                                }
                                            } else {
                                                $ticket['seat_num'] = $j;
                                                DB::table('tbl_ticket')->insert($ticket);
                                            }
                                        }
                                    }
                                } elseif ($i>4) {
                                    $ticket['class'] = 2;
                                    foreach ($seat_chars as $key => $seat_char) {
                                        $ticket['seat_char'] = $seat_char;
                                        for ($j=1; $j <= 14; $j++) { 
                                            if($key>=3 && $key<=6) {
                                                if($j<6 || $j>9) {
                                                    $ticket['seat_num'] = $j;
                                                    DB::table('tbl_ticket')->insert($ticket);
                                                }
                                            } else {
                                                $ticket['seat_num'] = $j;
                                                DB::table('tbl_ticket')->insert($ticket);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else if ($stand == "C" || $stand == "D" ) {
                    $ticket['stair'] = 2;
                    for($i = 1; $i<=10; $i++) {
                        $ticket['door'] = $i;
                        $ticket['class'] = 1;
                        foreach ($seat_chars as $key => $seat_char) {
                            $ticket['seat_char'] = $seat_char;
                            for ($j=1; $j <= 14; $j++) { 
                                if($key>=3 && $key<=6) {
                                    if($j<6 || $j>9) {
                                        $ticket['seat_num'] = $j;
                                        DB::table('tbl_ticket')->insert($ticket);
                                    }
                                } else {
                                    $ticket['seat_num'] = $j;
                                    DB::table('tbl_ticket')->insert($ticket);
                                }
                            }
                        }
                    }
                }
            }
        }
        return redirect()->route('match.list');
    }

    // Ticket
    public function list_ticket() {
        $this->AuthLogin(); //Gọi hàm kiểm tra đăng nhập
        $list_ticket = DB::table('tbl_ticket')
            ->join('tbl_ticketprice', 'tbl_ticket.ticket_price_id', '=', 'tbl_ticketprice.id')
            ->select('tbl_ticket.*', 'tbl_ticketprice.class1', 'tbl_ticketprice.class2', 'tbl_ticketprice.class3', 'tbl_ticketprice.class4')
            ->orderBy('id', 'desc')->get();
        $manager_ticket = view('admin.ticket.list_ticket')->with('list_ticket', $list_ticket);
        // echo '<pre>';
        // print_r($list_ticket);
        // echo '</pre>';
        return view('admin.layout')->with('admin.ticket.list_ticket', $manager_ticket);
    }
    // Seat
    public function showSeat(Request $request)
	{
        $data = $request->all();
        switch ($data['stand']) {
            case 'Atop': $stand = 'A'; $stair = 5; $floor = '5th'; break;
            case 'Abot': $stand = 'A'; $stair = 2; $floor = '2nd'; break;
            case 'Btop': $stand = 'B'; $stair = 5; $floor = '5th'; break;
            case 'Bbot': $stand = 'B'; $stair = 2; $floor = '2nd'; break;
            case '': $stand = 'C'; $stair = 2; $floor = '2nd'; break;
            case '': $stand = 'D'; $stair = 2; $floor = '2nd'; break;
            default: break;
        }
        switch ($data['cate']) {
            case 1: $class = '1st'; break;
            case 2: $class = '2nd'; break;
            case 3: $class = '3rd'; break;
            case 4: $class = '4th'; break;
            default: break;
        }
        $output = '';
        $output.= `
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLongTitle">Stand `.$stand.` (`.$floor.` floor) - `.$class.` class ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
                </div>
                <div class="modal-body">

                    <div id="door_modal" class="door-modal">

                        <div class="door-name">
                            <div class="p-3 border rounded">
                                <h1>DOOR 1</h1>
                            </div>
                        </div>

                        <div class="door-seats left">
                            <div class="door-row row-1">
                                <div class="seat A1" data-id="A1" value="A1">
                                    <div>A1</div>
                                </div>
                                <div class="seat B1" data-id="B1" value="B1">
                                    <div>B1</div>
                                </div>
                                <div class="seat C1" data-id="C1" value="C1">
                                    <div>C1</div>
                                </div>
                                <div class="seat D1" data-id="D1" value="D1">
                                    <div>D1</div>
                                </div>
                                <div class="seat E1" data-id="E1" value="E1">
                                    <div>E1</div>
                                </div>
                                <div class="seat F1" data-id="F1" value="F1">
                                    <div>F1</div>
                                </div>
                                <div class="seat G1" data-id="G1" value="G1">
                                    <div>G1</div>
                                </div>
                                <div class="seat H1" data-id="H1" value="H1">
                                    <div>H1</div>
                                </div>
                                <div class="seat I1" data-id="I1" value="I1">
                                    <div>I1</div>
                                </div>
                                <div class="seat J1" data-id="J1" value="J1">
                                    <div>J1</div>
                                </div>
                            </div>
                            <div class="door-row row-2">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-3">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-4">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-5">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-6">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-7">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                        </div>

                        <div class="door-seats right">
                            <div class="door-row row-1">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-2">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat invisible"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-3">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-4">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-5">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-6">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                            <div class="door-row row-7">
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                                <div class="seat"></div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <div class="input-seats container-fluid border rounded p-2" id="inputSeats">

                    </div>
                    <button type="button" class="border rounded btn-checkout">Checkout</button>
                </div>
            </div>
        </div>
        `;
        echo $output;
	}
}
