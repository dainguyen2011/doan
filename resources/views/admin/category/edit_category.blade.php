@extends('admin.layouts.index')
@section('content')
    <div class="view-edit-category">
        <h2>Sửa danh mục</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('post-sua-danh-muc',$category->id)}}" method="post" enctype="multipart/form-data">
            <table class="table  table-bordered">
                <tr>
                    <th>Tên danh mục</th>
                    <td><input type="text" class="form-control" value="{{$category->category_name}}"
                               name="category_name"></td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td><input type="text" class="form-control" value="{{$category->description}}" name="description">
                    </td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td><input type="number" class="form-control" value="{{$category->publish}}" name="publish">
                    </td>
                </tr>
                <tr>
                    <th>Yêu cầu</th>
                    <td><input type="number" class="form-control" value="{{$category->ordering}}" name="ordering"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i></button>
                        <a class="btn btn-danger" href="{{route('list-danh-muc')}}"><i class="fa fa-backward"></i></a>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
    </div>
@endsection
