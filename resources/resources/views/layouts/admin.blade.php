<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ url('css/font-awesome.css') }}" rel="stylesheet">
    @yield('style')
    <link href="{{ url('css/admin.css') }}" rel="stylesheet">
    @yield('header')
</head>

<body>


<nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse"><span
                        class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/admin">پنل مدیریت</a>
            <a class="navbar-brand" href="/" target="_blank">مشاهده سایت</a>
        </div>
        <div id="w0-collapse" class="collapse navbar-collapse">
        </div>
    </div>
</nav>
<div class="container-fluid">


    <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">


            <ul class="nav nav-sidebar" id="menu">

                <li id="li_1">
                    <a>
                        <span class="fa fa-shopping-cart"></span>
                        <span>محصولات</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/product') }}">مدیریت محصولات</a></li>
                        {{--<li><a href="{{ url('admin/product/create') }}">محصول جدید</a></li>--}}
                        <li><a href="{{ url('admin/category') }}">مدیریت دسته ها</a></li>
                        <li><a href="{{ url('admin/item') }}">ویژگی های محصول</a></li>
                        <li><a href="{{ url('admin/filter') }}">فیلتر های محصول</a></li>
                        <li><a href="{{ url('admin/amazing') }}">پیشنهاد شگفت انگیز</a></li>
                        {{--<li><a href="{{ url('admin/category/create') }}">دسته جدید</a></li>--}}
                    </ul>
                </li>

                <li id="li_2">
                    <a>
                        <span class="fa fa-list"></span>
                        <span>سفارشات</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/order') }}">مدیریت سفارشات</a></li>
                        {{--<li><a href="{{ url('admin/order/discount') }}">کد های تخفیف</a></li>
                        <li><a href="{{ url('admin/order/cart') }}">کارت هدیه</a></li>--}}
                    </ul>
                </li>

                <li id="li_3">
                    <a>
                        <span class="fa fa-address-card"></span>
                        <span>استان ها و شهر ها</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/ostan') }}">مدیریت استان ها</a></li>
                        <li><a href="{{ url('admin/shahr') }}">مدیریت شهرستان ها</a></li>
                    </ul>
                </li>

                <li id="li_4">
                    <a>
                        <span class="fa fa-user"></span>
                        <span>کاربران</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/user') }}">مدیریت کاربران</a></li>
                        <li><a href="{{ url('admin/user/create') }}">کاربر جدید</a></li>
                    </ul>
                </li>

                <li id="li_5">
                    <a href="{{ url('admin/statistics') }}">
                        <span class="fa fa-line-chart"></span>
                        <span>آمار بازدید سایت</span>
                    </a>
                </li>

                <li id="li_6">
                    <a href="{{ url('admin/comment') }}">
                        <span class="fa fa-comment"></span>
                        <span>نظرات کاربران سایت </span> @if($comment_count>0) ({{ $comment_count }}) @endif
                    </a>
                </li>

                {{--<li id="li_7">
                    <a href="{{ url('admin/question') }}">
                        <span class="fa fa-question"></span>
                        <span>پرسش کاربران سایت </span> @if($question_count>0) ({{ $question_count }}) @endif
                    </a>
                </li>--}}

                <li id="li_7">
                    <a href="{{ url('admin/banners') }}">
                        <span class="fa fa-bars"></span>
                        <span>بنرها</span>
                    </a>
                </li>

                <li id="li_8">
                    <a href="{{ url('admin/news') }}">
                        <span class="fa fa-newspaper-o"></span>
                        <span>اخبار</span>
                    </a>
                </li>

                <li id="li_9">
                    <a href="{{ url('admin/slider') }}">
                        <span class="fa fa-image"></span>
                        <span>اسلایدر</span>
                    </a>
                </li>

                <li id="li_10">
                    <a>
                        <span class="fa fa-cogs"></span>
                        <span>تنظیمات</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('admin/setting/pay') }}">تنظیمات پرداخت</a></li>
                    </ul>
                </li>


                <li id="li_11">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out"></span>
                        <span>خروج</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </li>

            </ul>


        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

            @yield('content')

        </div>
    </div>


</div>

<script type="text/javascript" src="{{ url('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('js/admin.js') }}"></script>
@yield('footer')
</body>


</html>

