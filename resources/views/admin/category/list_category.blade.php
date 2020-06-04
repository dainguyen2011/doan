@extends('admin.layouts.index')

@section('content')
    <h2>Danh sách danh mục</h2>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('warning') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('error') }}
        </div>
    @endif
    <div class="view-list-category">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Danh mục con</th>
                <th>Image</th>
                <th>Mô tả</th>
                <th><a href="{{route('them-danh-muc')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->parent}}</td>
                    <td><img style="width: 100px;" class="image-category" src="{{ asset('') }}/{{ pare_url_file($category->image) }}"></td>
                    <td>{!! $category->description !!}</td>
                    <th><a href="{{route('sua-danh-muc',$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a><a
                            onclick="return confirm('Bạn có muốn xóa không?')"     href="{{route('xoa-danh-muc',$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
