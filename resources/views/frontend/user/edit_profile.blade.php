@extends('frontend.master')
@section('content')
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
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="preview text-center">
                <img class="preview-img" src="{{url('/')}}/{{Auth::user()->avatar}}" alt="Preview Image" width="200"
                     height="200"/>
                <label for="image"><i style="color: red; display: contents" class="fas fa-camera"></i> </label>
                <input id="image" class="form-control" type="file" style="display: none" name="avatar"/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Tên :</label>
                <input class="form-control" type="text" value="{{Auth::user()->name}}" name="name" required
                       placeholder="Nhập tên "/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Tên đầy đủ: </label>
                <input class="form-control" type="text" value="{{Auth::user()->full_name}}" name="full_name" required
                       placeholder="Nhập tên đầy đủ"/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Email:</label>
                <input class="form-control" value="{{Auth::user()->email}}" type="email" name="email" required
                       placeholder="Nhập eamil"/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Số điện thoại:</label>
                <input class="form-control" type="number" value="{{Auth::user()->phone}}" name="phone" required
                       placeholder="Nhập số điện thoại"/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Ghi chú:</label>
                <input class="form-control" type="text" value="{{Auth::user()->note}}" name="note" required
                       placeholder="Nhập ghi chú"/>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <label>Giới tính:</label><br/>
                <label><input type="radio" name="gender" required value="1" checked/> Nam</label>
                <label><input type="radio" name="gender" required value="2"/> Nữ</label>
                <label><input type="radio" name="gender" required value="3"/> Khác</label>
                <span class="Error"></span>
            </div>
            <div class="form-group-user">
                <input class="btn btn-primary btn-block" type="submit" value="Submit"/>
            </div>
            {{csrf_field()}}
        </form>

        <script type="text/javascript">
            //CKEDITOR.replace( 'full_description' );
        </script>
    </div>
@endsection
