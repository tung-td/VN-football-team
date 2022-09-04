@extends('admin.layout')
@section('title', 'Team List')
@section('head_icon', 'list_alt')
@section('heading', 'Team List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary"></h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('team.add')}}">Add Team</a>
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
                        <th class="text-center">#</th>
                        <th style="width: 80px;" class="text-center">Image</th>
                        <th>Name</th>
                        <th>Squad</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($list_team as $key => $team)
                        @php $i++; @endphp
                        <tr>
                            <th class="text-center-height text-center">{{$i}}</th>
                            <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/team/'.$team->team_image)}}" width="80" height="80" alt="{{ $team->team_name}}"></td>
                            <td>{{ $team->team_name}}</td>
                            <td>
                                @switch($team->squad)
                                    @case(1) Men @break
                                    @case(2) Women @break
                                    @case(3) Youngs @break
                                    @case(4) Legends @break
                                    @default None
                                @endswitch
                            </td>
                            <td class="text-center">
                                <a href="{{URL('/edit-team/'.$team->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                                <a href="{{URL('/delete-team/'.$team->id)}}" onclick="return confirm('Sure you wanna delete this team?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection