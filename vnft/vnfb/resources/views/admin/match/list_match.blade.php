@extends('admin.layout')
@section('title', 'Match List')
@section('head_icon', 'list_alt')
@section('heading', 'Match List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
    </div> -->
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
                    @foreach($list_match as $key => $match)
                    <tr>
                        <td>{{ $match->tournament_id}}</td>
                        <td>{{ $match->type}}</td>
                        <td>{{ $match->squad}}</td>
                        <td>{{ $match->teamA_id}}</td>
                        <td>{{ $match->teamB_id}}</td>
                        <td>{{ $match->stadium}}</td>
                        <td style="padding: .5rem;" class="text-center"><img src="{{URL('public/uploads/match/'.$match->stadium_background)}}" width="80" height="80" alt="{{ $match->stadium}}"></td>
                        <td class="text-center">
                            <?php if($match->match_status == 0) { ?>
                                <a href="{{URL('/unactive-match/'.$match->match_id)}}">
                                    <i class="fa-2x fas fa-times text-danger" title="Hết hàng"></i>
                                </a>
                            <?php } else { ?>
                                <a href="{{URL('/active-match/'.$match->match_id)}}">
                                    <i class="fa-2x fas fa-check text-success" title="Còn hàng"></i>
                                </a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-match/'.$match->match_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-match/'.$match->match_id)}}" onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection