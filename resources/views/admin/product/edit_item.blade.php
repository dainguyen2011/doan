@extends('admin.layouts.index')
@section('content')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <div class="view-edit-product">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('post-sua-san-pham',$product->id)}}" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
                <tr>
                    <th>Product name</th>
                    <th><input type="text" class="form-control" value="{{$product->product_name}}" name="product_name">
                    </th>
                </tr>
                <tr>
                    <th>Product image intro</th>
                    <th>
                        <img class="product-image-intro-edit" src="{{url('/')}}/{{$product->product_image_intro}}">
                        <input type="file" class="form-control" name="product_image_intro">
                    </th>
                </tr>
                <tr>
                    <th>Category</th>
                    <th>
                        <select name="category_id">
                            <option value="">Chọn danh mục</option>
                            @foreach($parent_categories as $category)
                                <optgroup label="{{$category->category_name}}">
                                    @foreach($subcategories as $sub_category)
                                        @if ($sub_category->parent==$category->id)
                                            <option
                                                {{ $product->category_id == $sub_category->id ? " selected " : "" }} value="{{$sub_category->id}}">{{$sub_category->category_name}}</option>
                                        @endif
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>Publish</th>
                    <th>
                        <select name="publish">
                            <option <?php echo $product->publish == 1 ? ' selected ' : '' ?> value="1">Yes</option>
                            <option <?php echo $product->publish == 0 ? ' selected ' : '' ?> value="0">No</option>
                        </select>
                    </th>
                </tr>
                <tr>
                    <th>price</th>
                    <th>
                        <input type="text" name="price" value="{{$product->price}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Sale price</th>
                    <th>
                        <input type="text" name="sale" value="{{$product->sale}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Size</th>
                    <th>
                        <input type="text" name="size" value="{{$product->size}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Ordering</th>
                    <th>
                        <input type="text" name="ordering" value="{{$product->ordering}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <th>
                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control">
                    </th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>
                        <textarea id="txt" class="form-control" name="description">{{$product->description}}</textarea>
                    </th>
                </tr>
                <tr>
                    <th>Full description</th>
                    <th>
                        <textarea class="form-control" id="txt"
                                  name="full_description">{{$product->full_description}}</textarea>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            <a href="{{route('danh-sach-san-pham')}}" class="btn btn-primary"><i class="fa fa-backward"></i></a>
                        </div>
                    </td>
                </tr>
            </table>
            {{csrf_field()}}
        </form>
            <script language="javascript" >

                CKEDITOR.replace('txt');

            </script>
    </div>
@endsection
