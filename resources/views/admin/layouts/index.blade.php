<!DOCTYPE html>
<html>

<head>
    <title>Trang quản trịn Admin</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- Custom styling plus plugins -->
    <link rel="stylesheet" href="{{asset('build/css/main.css')}}">
    <link href="{{asset('vendors/ionicons-master/css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('build/css/extra_colors.css')}}" rel="stylesheet"/>
    <link href="{{asset('build/css/bootstrap-extra.css')}}" rel="stylesheet"/>
    <!-- bootstrap-wysiwyg -->
    <!-- <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <link href="{{asset('vendors/Font-Awesome-master/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Custom styling -->
    <link href="{{asset('build/css/custom-dashboard3.css')}}" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
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
                <!-- <button type="button" class="navbar-toggle" data-toggle="toggle" data-target="#sidebar-wrappe" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>-->
                <a class="navbar-brand" id="bHeader" href="{{route('home')}}">
                    <i class="ion-arrow-expand"> </i> Quản lý sản phẩm
                </a>

            </div>


            <ul class="nav navbar-nav navbar-left">
                <li><a href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a></li>
                <li><a href="#" onclick="toggleFullScreen(document.documentElement)"><i class="fa fa-arrows"></i></a>
                </li>

                <!--<li><a href="#contact"><i class="ion-map"></i></a></li>-->

            </ul>
            <!-- </div>-->
            <ul class="nav navbar-nav navbar-right ">
                <li>
                    <a href="#" class="dropdown-toggle user" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }} <i class="fa fa-user"></i>
                    </a>


                    <ul class="dropdown-menu dropdown-user" style="background: #fff;">
                        <li class="info-user-an">{{ Auth::user()->name }}  </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out fa-fw"></i> {{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>

                        </li>
                    </ul>

                </li>


            </ul>

            <!--/.nav-collapse -->
        </nav>

    </div>
    <!-- Fixed navbar -->

    <!-- Sidebar -->
    <div class="sidemenu">
        <div id="sidebar-wrapper">

            <section class="app">

                <aside class="sidebar">

                    <nav class="sidebar-nav" id="style-3">

                        <ul>
                            <li class="person-info">
                                <div class="an-sidebar-widgets">
                                    <div class="an-user-avatar">
                                        <img src="{{asset('build/img/img.jpg')}}" alt="an-user-info">
                                    </div>
                                    <div class="an-user-info">
                                        <div class="an-username">{{auth()->user()->name}}</div>
                                        <div class="an-permision">Administrator</div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="{{route('danh-sach-san-pham')}}"><i class="fa fa-map text-green"></i>
                                    <span class="">Quản lý sản phẩm</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('danh-sach-san-pham')}}"><i
                                                class="ion-email-unread text-yellow"></i>Danh sách sản phẩm</a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="{{route('danh-sach-san-pham')}}"><i--}}
{{--                                                class="ion-chatbox-working text-yellow"></i>Thêm sửa xóa sản phẩm</a>--}}

{{--                                    </li>--}}
                                </ul>
                            </li>
                            @if(Auth::check())
                                <li>
                                    <a href="{{route('list-danh-muc')}}"><i class="ion-paintbrush text-green"></i> <span
                                            class="">Quản lý danh mục</span></a>
                                    <ul class="nav-flyout">
                                        <li>
                                            <a href="{{route('list-danh-muc')}}"><i
                                                    class="ion-paintbucket text-green"></i>Danh sách danh mục</a>
                                        </li>
                                        <!-- <li>
                                <a href="gradidents.html"><i class="ion-paintbucket text-green"></i>Gradidents</a>
                            </li>
                            -->
{{--                                        <li>--}}
{{--                                            <a href="{{route('list-danh-muc')}}"><i class="ion-edit text-green"></i>Thêm--}}
{{--                                                sửa xoá danh mục</a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('list-don-hang')}}"><i class="fa fa-shopping-bag text-green"></i> <span
                                        class="">Quản lý đơn hàng</span></a>
                                <ul class="nav-flyout">
                                    <li>
                                        <a href="{{route('list-don-hang')}}"><i
                                                class="ion-arrow-return-right text-yellow"></i>Danh sách đơn hàng</a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="{{route('list-don-hang')}}"><i class="ion-at text-yellow"></i>Sửa xóa--}}
{{--                                            đơn hàng</a>--}}
{{--                                    </li>--}}
                                </ul>
                            </li>
{{--                            <li>--}}
{{--                                <a href="{{route('list-comment')}}"><i class="ion-leaf text-green"></i> <span class="">Quản lý bình luận</span></a>--}}
{{--                                <ul class="nav-flyout">--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('list-comment')}}"><i class="ion-arrow-swap text-green"></i>Danh--}}
{{--                                            sách bình luận</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="{{route('list-comment')}}"><i class="ion-asterisk text-green"></i>Xóa--}}
{{--                                            bình luận</a>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </li>--}}
                            <li>
                                <a href="{{route('list-thong-ke')}}"><i class="fa fa-filter text-green"></i><span class="">Thống kê</span></a>
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
                <span>Copyright &copy; Your Website 2019</span>
            </div>
        </div>
    </footer>
</div>


<script src="{{asset('vendors/bootstrap/dist/js/jquery.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('build/js/main.js')}}"></script>
<!-- jquery.dataTables -->
<script src="{{asset('build/js/jquery.dataTables.min.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{asset('vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<!-- page load pace-v1.0.0 -->
<script src="{{asset('vendors/pace-v1.0.0/pace.min.js')}}"></script>
<!-- chartjs  -->
<script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- custom dashboard -->
<script src="{{asset('build/js/custom-dashboard3.js')}}"></script>


</body>

</html>
