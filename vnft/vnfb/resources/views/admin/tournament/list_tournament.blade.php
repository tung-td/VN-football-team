@extends('admin.layout')
@section('title', 'Tournament List')
@section('head_icon', 'list_alt')
@section('heading', 'Tournament List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary"></h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('tournament.add')}}">Add Tournament</a>
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
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($list_tournament as $key => $tournament)
                        @php $i++; @endphp
                        <tr>
                            <th class="text-center-height text-center">{{$i}}</th>
                            <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/tournament/'.$tournament->tournament_image)}}" width="80" height="80" alt="{{ $tournament->tournament_name}}"></td>
                            <td>{{ $tournament->tournament_name}}</td>
                            <td class="text-center">
                                @if($tournament->status == 1)
                                    Available
                                @else
                                    Expired
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{URL('/edit-tournament/'.$tournament->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                                <a href="{{URL('/delete-tournament/'.$tournament->id)}}" onclick="return confirm('Sure you wanna delete this tournament?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection