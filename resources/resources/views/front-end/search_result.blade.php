@extends('layouts.front-end')

@section('content')
    <!-- Breadcrumbs -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"><a title="Go to Home Page" href="/">خانه</a><span>&raquo;</span>
                        </li>

                        <li>جستجو</li>
                        <li><strong>{{$search}}</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Main Container -->
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-12">
                    <div class="page-content page-order">
                        <div class="page-title">
                            <h2>نتایج جستجو برای {{$search}}</h2>
                        </div>

                        <div class="product-list-area">
                            <ul class="products-list" id="products-list">

                                @foreach($products as $product)

                                    <li class="item ">
                                        <div class="product-img">
                                            @if($product->discounts>0)
                                                <div class="icon-sale-label sale-right">تخفیف</div>
                                            @endif
                                            <a href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}"
                                               title="{{$product->title}}">
                                                <figure><img class="small-image"
                                                             src="{{asset('upload/'.$product->get_img->url)}}"
                                                             alt="{{$product->title}}"></figure>
                                            </a></div>
                                        <div class="product-shop">
                                            <h2 class="product-name"><a
                                                        href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}"
                                                        title="{{$product->title}}">{{$product->title}}</a></h2>
                                            {{--<div class="ratings">
                                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                                <p class="rating-links"> <a href="#/">4 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                                            </div>--}}
                                            <div class="price-box">
                                                @if($product->product_status!=1)
                                                    <span class="regular-price"> <span
                                                                class="price">ناموجود</span> </span>
                                                @else
                                                    @if(!empty($product->discounts))
                                                        <p class="special-price"><span
                                                                    class="price-label">Special Price</span>
                                                            <span class="price"> {{number_format($product->price-$product->discounts)}} @lang('front-end.product.price_label')</span>
                                                        </p>
                                                        <p class="old-price"><span
                                                                    class="price-label">Regular Price:</span>
                                                            <span class="price"> {{number_format($product->price)}} </span>
                                                        </p>
                                                    @elseif($product->price>0)
                                                        <span class="regular-price"> <span
                                                                    class="price"> {{number_format($product->price)}} @lang('front-end.product.price_label')</span> </span>
                                                    @else
                                                        <span class="regular-price"> <span
                                                                    class="price">تماس بگیرید</span> </span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="desc std">
                                                <p>{!! $product->text!=null?$product->text:'بررسی اجمالی برای این کالا ثبت نشده است!' !!}</p>
                                            </div>
                                            <div class="actions">
                                                <a class="button cart-button" title="@lang('front-end.product.add_to_cart')"
                                                   href="{{route('site.addToCartByButton',[$product->id])}}"><i
                                                            class="fa fa-shopping-cart"></i><span> @lang('front-end.product.add_to_cart')</span>
                                                </a>
                                                {{--<ul>
                                                    <li><a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span>
                                                        </a></li>
                                                    <li><a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span>
                                                        </a></li>
                                                </ul>--}}
                                            </div>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>

                        {{$products->appends($_GET)->links()}}


                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Main Container End -->
@endsection