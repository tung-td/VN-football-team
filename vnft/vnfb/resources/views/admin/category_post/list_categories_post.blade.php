@extends('admin.layout')
@section('title', 'News Category List')
@section('head_icon', 'list_alt')
@section('heading', 'News Category List')
@section('admin_content')
<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Danh mục bài viết</h1>
<p class="mb-4"></p> -->

<!-- DataTales Example -->
<div class="card shadow mb-4" style="background: white!important; margin: 20px; padding: 10px; border-radius: 5px;">
    <div class="card-header py-3">
        <div class="row">
            <h5 class="col-md-6 m-0 font-weight-bold text-primary">News Category List</h5>
            <div style="text-align: right;" class="col-md-6">
            <a class="btn btn-grape" href="{{route('cate.post.add')}}">Add News Category</a>
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
                        <th>Name</th>
                        <th>Time</th>
                        <th>Last Edit</th>
                        <th class="text-center">Active</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_categories_post as $key => $cate_pro)
                    <tr>
                        <td>{{ $cate_pro->category_name}}</td>
                        <td>{{ $cate_pro->created_at}}</td>
                        <td>
                        <?php if($cate_pro->updated_at == '') { ?>
                                {{ $cate_pro->created_at}}
                            <?php } else { ?>
                                {{ $cate_pro->updated_at}}
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($cate_pro->category_status == 0) { ?>
                                <a href="{{URL('/unactive-category-post/'.$cate_pro->category_id)}}"><i class="fa-2x fas fa-times text-danger"></i></a>
                            <?php } else { ?>
                                <a href="{{URL('/active-category-post/'.$cate_pro->category_id)}}"><i class="fa-2x fas fa-check text-success"></i></a>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="{{URL('/edit-category-post/'.$cate_pro->category_id)}}"><button class="btn btn-warning mb-1"><i class="fas fa-edit"></i></button></a>
                            <a href="{{URL('/delete-category-post/'.$cate_pro->category_id)}}" onclick="return confirm('Bạn có chắn chắn xóa danh mục bài viết này không?')"><button class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i></button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection