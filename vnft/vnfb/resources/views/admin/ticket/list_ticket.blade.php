@extends('admin.layout')
@section('title', 'Tickets List')
@section('head_icon', 'list_alt')
@section('heading', 'Tickets List')
@section('admin_content')

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
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
                        <th>Match ID</th>
                        <th>Stand</th>
                        <th>Stair</th>
                        <th>Door</th>
                        <th>Class</th>
                        <th>Seat</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 0; @endphp
                    @foreach($list_ticket as $key => $ticket)
                        @php $i++; @endphp
                        <tr>
                            <th class="text-center-height text-center">{{$i}}</th>
                            <td>{{$ticket->match_id}}</td>
                            <td>{{$ticket->stand}}</td>
                            <td>{{$ticket->stair}}</td>
                            <td>{{$ticket->door}}</td>
                            <td>{{$ticket->class}}</td>
                            <td>{{$ticket->seat_char}}{{$ticket->seat_num}}</td>
                            <td>{{$ticket->status}}</td>
                            <td class="text-center">
                                <a href="{{URL('/edit-ticket/'.$ticket->id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                                <a href="{{URL('/delete-ticket/'.$ticket->id)}}" onclick="return confirm('Sure you wanna delete this ticket?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection