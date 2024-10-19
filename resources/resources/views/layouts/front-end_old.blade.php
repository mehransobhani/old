<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

    <!-- jquery js -->
    <script type="text/javascript" src="{{asset('js/front-end/jquery.min.js')}}"></script>

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

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- mobile menu -->
@include('front-end.mobile_menu')
<!-- end mobile menu -->
<div id="page">

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
                            <a title="e-commerce" href="{{route('site.homepage')}}">
                                <img alt="e-commerce" src="{{asset('images/front-end/logo.png')}}">
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
    <!--Newsletter Popup Start-->
{{--<div id="myModal" class="modal fade">
    <div class="modal-dialog newsletter-popup">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <div class="modal-body">
                <h4 class="modal-title">NEWSLETTER SIGNUP</h4>
                <form id="newsletter-form" method="post" action="#">
                    <div class="content-subscribe">
                        <div class="form-subscribe-header">
                            <label>Subscribe to be the first to know about Sales, Events, and Exclusive Offers!</label>
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-text newsletter-subscribe" title="Sign up for our newsletter" name="email" placeholder="Enter your email address">
                        </div>
                        <div class="actions">
                            <button class="button-subscribe" title="Subscribe" type="submit">Subscribe</button>
                        </div>
                    </div>
                </form>
                <div class="subscribe-bottom">
                    <input name="notshowpopup" id="notshowpopup" type="checkbox">
                    Don’t show this popup again </div>
            </div>
        </div>
    </div>
</div>--}}
<!--End of Newsletter Popup-->
</div>

<!-- JS -->

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
        var inner_html = '<a href="' + item.url + '" ><div class="list_item_container"><div class="image"><img src="' + item.image + '" ></div><div class="label"><h4><b>' + item.title + '</b></h4><span class="collage">' + item.category + '</span></div></div></a>';
        return $("<li></li>")
            .data("item.autocomplete", item)
            .append(inner_html)
            .appendTo(ul);
    }

</script>

@yield('bottom_script')
</body>
</html>
