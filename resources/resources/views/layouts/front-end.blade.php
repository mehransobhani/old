<!DOCTYPE html>
<html lang="fa">
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic page needs -->
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    {!! SEO::generate(true) !!}

    <meta name="Developer" content="Mohammad Razzaghi - 1razzaghi@gmail.com">

    <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/front-end/favicon.ico')}}">

    <!-- CSS Style -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/bootstrap-rtl.css')}}">

    <!-- font-awesome & simple line icons CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/font-awesome.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/simple-line-icons.css')}}" media="all">

    <!-- owl.carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/owl.theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/owl.transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/owl.carousel.rtl.css')}}">

    <!-- animate CSS  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/animate.css')}}" media="all">

    <!-- flexslider CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/flexslider.css')}}">

    <!-- jquery-ui.min CSS  -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/auto_complete.css')}}">

    <!-- Revolution Slider CSS -->
    <link href="{{asset('css/front-end/revolution-slider.css')}}" rel="stylesheet">

    <!-- style CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/style.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/rtl.css')}}" media="all">

    @yield('top_style')
</head>

<body class="cms-index-index cms-home-page">


{{--<div class="phone_container">
    <div class="item pirate">
        <img src="{{asset('images/front-end/phone.png')}}" width="100" alt="Item 1">
    </div>
</div>--}}

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- mobile menu -->
@include('front-end.mobile_menu')
<!-- end mobile menu -->
<div id="page">

    <div class="spinner-wrapper">
        <div class="spinner">
            {{--<div class="double-bounce1"></div>
            <div class="double-bounce2"></div>--}}
        </div>
    </div>


    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-top">
                @include('front-end.top_bar')
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-xs-12">
                        <!-- Header Logo -->
                        <div class="logo">
                            <a href="{{route('site.homepage')}}">
                                <img src="{{asset('images/front-end/logos/top_logo.png')}}">
                            </a>
                        </div>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-xs-10 col-sm-6 col-md-6 jtv-top-search">
                        <!-- Search -->
                    @include('front-end.top_search')
                    <!-- End Search -->
                    </div>
                    <!-- top cart -->

                    <div class="col-lg-3 col-xs-2 top-cart">
                        <div class="top-cart-contain">
                            @include('front-end.top_shopping_cart')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- Navbar -->
    <nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    @include('front-end.categories')
                </div>
                <div class="col-md-9 col-sm-8">
                    @include('front-end.top_menus')
                </div>
            </div>
        </div>
    </nav>
    <!-- end nav -->

@yield('slider')


<!-- main container -->
@yield('content')

<!-- Footer -->

    @include('front-end.footer')
    <a href="#" class="totop"> </a>
    <!-- End Footer -->

    @if(session()->pull('shopping_cart'))
    <!--Newsletter Popup Start-->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog newsletter-popup">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        <span>محصول با موفقیت به سبد خرید اضافه شد</span>
                        <div class="subscribe-bottom" align="center">
                            <a class="button" href="{{route('site.shoppingCart')}}"><i
                                        class="fa fa-shopping-cart"></i><span> مشاهده سبد خرید</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Newsletter Popup-->
    @endif
</div>

<!-- JS -->

<!-- jquery js -->
<script type="text/javascript" src="{{asset('js/front-end/jquery.min.js')}}"></script>

<!-- bootstrap js -->
<script type="text/javascript" src="{{asset('js/front-end/bootstrap.min.js')}}"></script>

<!-- owl.carousel.min js -->
<script type="text/javascript" src="{{asset('js/front-end/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/front-end/owl.carousel.rtl.js')}}"></script>

<!-- bxslider js -->
<script type="text/javascript" src="{{asset('js/front-end/jquery.bxslider.js')}}"></script>

<!-- Slider Js -->
<script type="text/javascript" src="{{asset('js/front-end/revolution-slider.js')}}"></script>

<!-- megamenu js -->
<script type="text/javascript" src="{{asset('js/front-end/megamenu.js')}}"></script>
<script type="text/javascript">
    /* <![CDATA[ */
    var mega_menu = '0';

    /* ]]> */
</script>

<!-- jquery.mobile-menu js -->
<script type="text/javascript" src="{{asset('js/front-end/mobile-menu.js')}}"></script>

<!--jquery-ui.min js -->
<script type="text/javascript" src="{{asset('js/front-end/jquery-ui.js')}}"></script>

<!-- main js -->
<script type="text/javascript" src="{{asset('js/front-end/main.js')}}"></script>

<!-- countdown js -->
<script type="text/javascript" src="{{asset('js/front-end/countdown.js')}}"></script>

<!-- Revolution Slider -->
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.tp-banner').revolution(
            {
                delay: 9000,
                startwidth: 1170,
                startheight: 530,
                hideThumbs: 10,

                navigationType: "bullet",
                navigationStyle: "preview1",

                hideArrowsOnMobile: "on",

                touchenabled: "on",
                onHoverStop: "on",
                spinner: "spinner4"
            });
    });

    var inner_html = '';

    $("#productSearchTerm").autocomplete({
        source: "{{ route('searchProducts') }}",
        focus: function (event, ui) {
            //$( "#search" ).val( ui.item.title ); // uncomment this line if you want to select value to search box
            return false;
        },
        select: function (event, ui) {
            window.location.href = ui.item.url;
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        if (item.show_more) {
            inner_html = '<div align="center" class="more_search_result"><a href="' + item.url + '" class="button" style="font-family: Vazir"><i class="fa fa-search"></i><span> مشاهده همه نتایج</span></a></div>';
        } else {
            inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="product_image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4><span class="collage">' + item.category + '</span></div></div></a>';
        }
        return $("<li></li>")
            .data("item.autocomplete", item)
            .append(inner_html)
            .appendTo(ul);
        //console.log();
    }
</script>

<script type="text/javascript">window.$crisp = [];
    window.CRISP_WEBSITE_ID = "fa177edd-dc2c-44d1-9559-5b7633396fbf";
    (function () {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();</script>

<script>
    $(document).ready(function () {
//Preloader
        preloaderFadeOutTime = 500;

        function hidePreloader() {
            var preloader = $('.spinner-wrapper');
            preloader.fadeOut(preloaderFadeOutTime);
        }

        hidePreloader();
    });
</script>

@yield('bottom_script')
</body>
</html>
