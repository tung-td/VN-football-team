@extends('admin.layout')
@section('title', 'Player List')
@section('head_icon', 'list_alt')
@section('heading', 'Player List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary">Player List</h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('player.add')}}">Add Player</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <p style="color: red; font-size: 14px;">
                <?php
                use Illuminate\Support\Facades\Session;
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </p>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th style="width: 80px;" class="text-center">Image</th>
                        <th>Name</th>
                        <th>Squad</th>
                        <th>Position</th>
                        <th>Shirt Number</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <th>Birthday</th>
                        <th>Club</th>
                        <th>Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_player as $key => $player)
                    <tr>
                        <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/player/'.$player->player_image)}}" width="80" height="80" alt="{{ $player->player_name}}"></td>
                        <td>{{ $player->player_name}}</td>
                        <td>
                            @switch($player->player_squad)
                                @case(1) Men @break
                                @case(2) Women @break
                                @case(3) Youngs @break
                                @case(4) Legends @break
                                @default None
                            @endswitch
                        </td>
                        <td>
                            @switch($player->player_position)
                                @case(1) Goalkeeper @break
                                @case(2) Defender @break
                                @case(3) Midfielder @break
                                @case(4) Forward @break
                                @default None
                            @endswitch
                        </td>
                        <td>{{ $player->player_shirt_num}}</td>
                        <td class="text-center">
                            <?php if($player->player_status == 0) { ?>
                                <a href="{{URL('/unactive-player/'.$player->player_id)}}">
                                    <i class="fa-2x fas fa-times text-danger" title="Official Squad"></i>
                                </a>
                            <?php } else { ?>
                                <a href="{{URL('/active-player/'.$player->player_id)}}">
                                    <i class="fa-2x fas fa-check text-success" title="Reserve Squad"></i>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-player/'.$player->player_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-player/'.$player->player_id)}}" onclick="return confirm('Sure you wanna delete this player?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                        <td>{{ $player->player_birth}}</td>
                        <td>{{ $player->player_club}}</td>
                        <td>
                            @if($player->player_gender == 0)
                                Male
                            @else
                                Female
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection