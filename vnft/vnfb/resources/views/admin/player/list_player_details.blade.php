@extends('admin.layout')
@section('title', 'Player Details List')
@section('head_icon', 'list_alt')
@section('heading', 'Player Details List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary">Player Details List</h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('player.details.add')}}">Add Details Player</a>
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
                        <th>Appearance</th>
                        <th>Total Goals</th>
                        <th>Trophies</th>
                        <th>Biography</th>
                        <th>Joined</th>
                        <th>First Match</th>
                        <th>First Concurrent</th>
                        <th>Quote</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_player_details as $key => $player_details)
                    <tr>
                        <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/player_details/'.$player_details->img)}}" width="80" height="80" alt="{{ $player_details->player_name}}"></td>
                        <td>{{ $player_details->player_name}}</td>
                        <td>{{ $player_details->appearance}}</td>
                        <td>{{ $player_details->total_goals}}</td>
                        <td>{{ $player_details->trophies}}</td>
                        <td>{{ $player_details->bio}}</td>
                        <td>{{ $player_details->joined}}</td>
                        <td>{{ $player_details->first_match}}</td>
                        <td>{{ $player_details->first_concurrent}}</td>
                        <td>{{ $player_details->quote}}</td>
                        <td class="text-center">
                            <a href="{{URL('/edit-player-details/'.$player_details->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/player-details/delete/'.$player_details->id)}}" onclick="return confirm('Sure you wanna delete this player details?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection