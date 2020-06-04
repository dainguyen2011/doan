<!DOCTYPE html>
<html>

<head>
    <title>Trang quản trịn Admin</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('build/css/main.css')}}">
    <link href="{{asset('vendors/ionicons-master/css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('build/css/extra_colors.css')}}" rel="stylesheet"/>
    <link href="{{asset('build/css/bootstrap-extra.css')}}" rel="stylesheet"/>
    <script src="{{asset('build/js/main.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{asset('vendors/Font-Awesome-master/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('build/css/custom-dashboard3.css')}}" rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3674109-28"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-3674109-28');
    </script>
</head>

<body>
<div id="wrapper" style="font-family: 'Times New Roman'">
    <!-- Fixed navbar -->
    <div class="navmenu">
        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega">

            <div style="font-family: 'Times New Roman'" class="navbar-header">
                <a class="navbar-brand" id="bHeader" href="{{route('home')}}">
                    Quản lý cửa hàng
                </a>

            </div>


            <ul class="nav navbar-nav navbar-left">
                <li><a href="#" onclick="toggleFullScreen(document.documentElement)"><i class="fa fa-arrows"></i></a>
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right ">
                <li>
                    <a href="#" class="dropdown-toggle user" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fa fa-user"></i>
                    </a>


                    <ul class="dropdown-menu dropdown-user" style="background: #fff;">
                        <li class="info-user-an" style="font-size: 40px">{{ Auth::user()->name }}  </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out fa-fw"></i> {{ __('Đăng xuất') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>

                </li>


            </ul>

        </nav>

    </div>

    <div class="sidemenu">
        <div id="sidebar-wrapper">

            <section class="app">

                <aside class="sidebar">

                    <nav class="sidebar-nav" id="style-3">

                        <ul>
                            <li class="person-info">
                                <div class="an-sidebar-widgets">
                                    <div class="an-user-avatar">
                                        <img src="{{ asset('/'.auth()->user()->avatar)}}" alt="an-user-info">
                                    </div>
                                    <div class="an-user-info">
                                        <div class="an-username">{{auth()->user()->name}}</div>
                                        <div class="an-permision">{{auth()->user()->type}}</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a><i class="fa fa-product-hunt text-green"></i>
                                    <span
                                        class="">Quản lý sản phẩm</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('danh-sach-san-pham')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Danh sách sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-users text-green"></i> <span
                                        class="">Quản lý khách hàng</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('danh-sach-khach-hang')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Danh sách khách hàng</a>
                                    </li>
                                </ul>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="{{route('list-danh-muc')}}"><i class="fa fa-list-alt text-green"></i> <span
                                            class="">Quản lý danh mục</span></a>
                                    <ul class="nav-flyout">
                                        <li>
                                            <a href="{{route('list-danh-muc')}}"><i
                                                    class="ion-paintbucket text-green"></i>Danh sách danh mục</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('list-don-hang')}}"><i class="fa fa-shopping-cart text-green"></i> <span
                                        class="">Quản lý đơn hàng</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('list-don-hang')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Danh sách đơn hàng</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a><i class="fa fa-filter text-green"></i> <span
                                        class="">Thống kê</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('list-thong-ke')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Theo đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="{{route('list-thong-ke-sp')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Theo sản phẩm</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </aside>
            </section>
        </div>
    </div>
    <!-- Sidebar -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /page content -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
</div>
</body>

</html>
