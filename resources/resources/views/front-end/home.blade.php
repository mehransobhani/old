@extends('layouts.front-end')


@section('slider')

    <!-- Home Slider Start -->
    <div class="slider">
        @include('front-end.main_page_sliders')
    </div>

@endsection

@section('content')
    <div class="main-container col1-layout">

        <div class="container">
            @include('front-end.service')
            <div class="row">
                @include('front-end.featured_products')
                @include('front-end.hot_deals')

            </div>
        </div>
        <!-- end main container -->

        <!-- top banner -->
    @include('front-end.top_banners')


    <!--special-products-->

        @include('front-end.most_visited_products')

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="jtv-banner-box banner-inner" style="margin-top: 0px!important;">
                        <div class="image"><a class="jtv-banner-opacity"
                                              href="{{$siteBanners['mid_right']['url']}}"><img
                                        src="{{asset('upload/'.$siteBanners['mid_right']['img'])}}" alt=""></a></div>
                        <div class="jtv-content-text">
                            <h3 class="title">{{$siteBanners['mid_right']['title']}}</h3>
                            <span class="sub-title">{{$siteBanners['mid_right']['descriptions']}}</span>
                        </div>
                    </div>
                </div>
                <!-- End Testimonials Box -->
                <!-- our clients Slider -->
                <div class="col-md-6">
                    @include('front-end.intro_video')
                </div>
            </div>
        </div>


        @include('front-end.new_products')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jtv-banner-box banner-inner">
                        <div class="image"><a class="jtv-banner-opacity"
                                              href="{{$siteBanners['top_full']['url']}}"><img
                                        src="{{asset('upload/'.$siteBanners['top_full']['img'])}}" alt=""></a></div>
                        <div class="jtv-content-text">
                            <h3 class="title">{{$siteBanners['top_full']['title']}}</h3>
                            <span class="sub-title">{{$siteBanners['top_full']['descriptions']}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Latest news start -->

    @include('front-end.news')

    <!-- Bottom Banner Start -->



    @include('front-end.bottom_banners')


    @include('front-end.client_slider')

    {{--@include('front-end.gurantee')--}}

    <!-- category area start -->
    {{--<div class="jtv-category-area">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="jtv-single-cat">
                        <h2 class="cat-title">Top Rated</h2>
                        <div class="jtv-product">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img10.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img10.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box"><span class="regular-price"> <span
                                                class="price">$125.00</span> </span>
                                </div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="jtv-product jtv-cat-margin">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img07.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img08.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box">
                                    <p class="special-price"><span class="price-label">Special Price</span> <span
                                                class="price"> $456.00 </span></p>
                                    <p class="old-price"><span class="price-label">Regular Price:</span> <span
                                                class="price"> $567.00 </span></p>
                                </div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="jtv-product jtv-cat-margin">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img08.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img09.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box"><span class="regular-price"> <span
                                                class="price">$225.00</span> </span>
                                </div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="jtv-single-cat">
                        <h2 class="cat-title">ON SALE</h2>
                        <div class="jtv-product">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img12.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img11.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box">
                                    <p class="special-price"><span class="price-label">Special Price</span> <span
                                                class="price"> $99.00 </span></p>
                                    <p class="old-price"><span class="price-label">Regular Price:</span> <span
                                                class="price"> $119.00 </span></p>
                                </div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="jtv-product jtv-cat-margin">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img05.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img10.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box"><span class="regular-price"> <span
                                                class="price">$189.00</span> </span>
                                </div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="jtv-product jtv-cat-margin">
                            <div class="product-img"><a href="single_product.html"> <img
                                            src="images/front-end/products/img01.jpg" alt=""> <img
                                            class="secondary-img"
                                            src="images/front-end/products/img03.jpg"
                                            alt=""> </a></div>
                            <div class="jtv-product-content">
                                <h3><a href="single_product.html">Lorem ipsum dolor sit amet</a></h3>
                                <div class="price-box"><span class="regular-price"> <span
                                                class="price">$88.99</span> </span></div>
                                <div class="jtv-product-action">
                                    <div class="jtv-extra-link">
                                        <div class="button-cart">
                                            <button><i class="fa fa-shopping-cart"></i></button>
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#productModal"><i
                                                    class="fa fa-search"></i></a> <a href="#"><i
                                                    class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- service area start -->
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="jtv-service-area">

                        <!-- jtv-single-service start -->

                        <div class="jtv-single-service">
                            <div class="service-icon"><img alt="" src="images/front-end/customer-service-icon.png">
                            </div>
                            <div class="service-text">
                                <h2>24/7 customer service</h2>
                                <p><span>Call us 24/7 at 000 - 123 - 456</span></p>
                            </div>
                        </div>
                        <div class="jtv-single-service">
                            <div class="service-icon"><img alt="" src="images/front-end/shipping-icon.png"></div>
                            <div class="service-text">
                                <h2>free shipping worldwide</h2>
                                <p><span>On order over $199 - 7 days a week</span></p>
                            </div>
                        </div>
                        <div class="jtv-single-service">
                            <div class="service-icon"><img alt="" src="images/front-end/guaratee-icon.png"></div>
                            <div class="service-text">
                                <h2>money back guaratee!</h2>
                                <p><span>Send within 30 days</span></p>
                            </div>
                        </div>

                        <!-- jtv-single-service end -->

                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- category-area end -->

    </div>

@endsection
