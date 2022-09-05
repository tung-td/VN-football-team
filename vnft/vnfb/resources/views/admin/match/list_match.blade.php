@extends('admin.layout')
@section('title', 'Match List')
@section('head_icon', 'list_alt')
@section('heading', 'Match List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary"></h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('match.add')}}">Add Match</a>
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
                        <th>#</th>
                        <th>Tournament</th>
                        <th>Type</th>
                        <th>Squad</th>
                        <th>Team A</th>
                        <th>Team B</th>
                        <th>Stadium</th>
                        <th style="width: 80px;" class="text-center">Stadium Background</th>
                        <th class="text-center">Ticket</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($list_match as $key => $match)
                        @php $i++; @endphp
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{ $match->tournament_name}}</td>
                        <td>{{ $match->type}}</td>
                        <td>
                            @switch($match->squad)
                                @case(1) Men @break
                                @case(2) Women @break
                                @case(3) Youngs @break
                                @case(4) Legends @break
                                @default None
                            @endswitch
                        </td>
                        <td>
                            @foreach($list_team as $key => $team)
                                @if($team->id == $match->teamA_id)
                                    {{$team->team_name}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($list_team as $key => $team)
                                @if($team->id == $match->teamB_id)
                                    {{$team->team_name}}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $match->stadium}}</td>
                        <td style="padding: .5rem;" class="text-center">
                            <img src="{{URL('public/uploads/match/'.$match->stadium_background)}}" width="80" height="80" alt="{{ $match->stadium}}">
                        </td>
                        <td>
                            @if($match->ticket == 0) No ticket sales
                            @elseif($match->ticket == 1) Ticket sales
                            @else Wrong value @endif
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-match/'.$match->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-match/'.$match->id)}}" onclick="return confirm('Wanna delete this?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection