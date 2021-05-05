<!-- MAIN MENU AREA -->

<div class="main-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @php
                    $list_root_category=DB::table('categories')->where('parent','=',null)->get();
                    $list_sub_category=DB::table('categories')->where('parent','!=',null)->get();
                @endphp
                <div class="main-menu hidden-xs">
                    <nav>
                        <ul>
                            <li><a href="{{route('home')}}" class="active">Trang chủ</a></li>
                            @foreach($list_root_category as $root_category)
                                <li>
                                    <a href="javascript:void(0)">{{$root_category->category_name}}</a>
                                    <ul class="sub-category">
                                        @foreach($list_sub_category as $sub_category)
                                            @if($sub_category->parent==$root_category->id)
                                                <li style="display: inline">
                                                    <a href="{{route('danh-muc',$sub_category->id)}}">{{$sub_category->category_name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                            <li><a href="{{route('gioi-thieu')}}"> Giới thiệu</a></li>
                            <li><a href="{{route('contact')}}"> Liên Hệ</a></li>
                            <li><a href="{{route('detail-order')}}">Thông tin đơn hàng</a></li>
                            <li><div class="dropdown">
                                    <a class="dropbtn">Danh mục</a>
                                    <div class="dropdown-content">
                                        <a href="{{route('danh-muc')}}">đầm dã ngoại</a>
                                        <a >DENIM JACKETS & ÁO KHOÁC</a>
                                        <a >ÁO KHOÁC & ÁO JACKETS</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SUPPORT AREA -->
<div class="support-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="single-support">
                    <div class="sigle-support-icon">
                        <p><i class="fa fa-plane"></i></p>
                    </div>
                    <div class="sigle-support-content">
                        <h2>FREE SHIPPING </h2>
                        <p>Toàn Quốc</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="single-support">
                    <div class="sigle-support-icon">
                        <p><i class="fa fa-dollar"></i></p>
                    </div>
                    <div class="sigle-support-content">
                        <h2>PRICE </h2>
                        <p>Giá cả hợp lý</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="single-support">
                    <div class="sigle-support-icon">
                        <p><i class="fa fa-clock-o"></i></p>
                    </div>
                    <div class="sigle-support-content">
                        <h2>24/7 SUPPORT</h2>
                        <p>Tư vấn trực tuyến</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 hidden-sm col-xs-12">
                <div class="single-support">
                    <div class="sigle-support-icon">
                        <p><i class="fa fa-umbrella"></i></p>
                    </div>
                    <div class="sigle-support-content">
                        <h2>SAFE SHOPPING</h2>
                        <p>Đảm bảo mua sắm an toàn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
