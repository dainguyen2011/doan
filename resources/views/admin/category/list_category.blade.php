@extends('admin.layouts.index')

@section('content')
    <div class="view-list-category">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>STT</th>
                <th>Category name</th>
                <th>Parent id</th>
{{--                <th>Image</th>--}}
                <th>Description</th>
                <th><a href="{{route('them-danh-muc')}}" class="btn btn-primary"><i class="fa fa-plus-square"></i></a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->category_name}}</td>
                    <td>{{$category->parent}}</td>
{{--                    <td><img class="image-category" src="{{url('/')}}/{{$category->image_category}}"></td>--}}
                    <td>{{$category->description}}</td>
                    <th><a href="{{route('sua-danh-muc',$category->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a><a
                            onclick="return confirm('Bạn có muốn xóa không?')"     href="{{route('xoa-danh-muc',$category->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
