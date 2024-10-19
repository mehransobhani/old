<!--Hot deal -->
<div class="col-md-3 col-sm-4 col-xs-12 hot-products">
    <div class="hot-deal"><span class="title-text">@lang('front-end.hot_deal_counter.header')</span>
        <ul class="products-grid">
            @foreach($amazing as $amazing_product)

                <li class="item">
                    <div class="product-item">
                        <div class="item-inner">
                            <div class="product-thumbnail">
                                <div class="icon-hot-label hot-right">@lang('front-end.product.hot')</div>
                                <div class="pr-img-area"><a title="{{$amazing_product->get_product->title}}"
                                                            href="{{route('site.showProductDetails',[$amazing_product->get_product->code_url,$amazing_product->get_product->title_url])}}">
                                        <figure>
                                            @php  $t=$amazing_product->timestamp-time(); @endphp
                                            @if($t<0)
                                                <div class="Finished_Badge">
                                                    <img src="{{ url('images/Finished_Badge.png') }}">
                                                </div>


                                                <div class="incredible__finishEffect"></div>
                                            @endif
                                            <img class="first-img"
                                                 src="{{asset('upload/'.$amazing_product->get_product->get_img->url)}}"
                                                 alt="">
                                            <img class="hover-img"
                                                 src="{{asset('upload/'.$amazing_product->get_product->get_img->url)}}"
                                                 alt="">
                                        </figure>
                                    </a>
                                    <button type="button" class="add-to-cart-mt"><i
                                                class="fa fa-shopping-cart"></i><span> @lang('front-end.product.add_to_cart')</span>
                                    </button>
                                </div>
                                <div class="jtv-box-timer">
                                    <div class="countbox_1 jtv-timer-grid"></div>
                                </div>
                                <div class="pr-info-area">
                                    <div class="pr-button">
                                        <div class="mt-button add_to_wishlist"><a
                                                    href="{{route('site.addToWishList',[$amazing_product->id])}}" title="افزودن به علاقه مندی"> <i
                                                        class="fa fa-heart"></i> </a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a title="{{$amazing_product->get_product->title}}"
                                                               href="{{route('site.showProductDetails',[$amazing_product->get_product->code_url,$amazing_product->get_product->title_url])}}">{{$amazing_product->get_product->title}}</a>
                                    </div>
                                    <div class="item-content">
                                        {{--<div class="rating">
                                            <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i
                                                    class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                        </div>--}}
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price"> <span
                                                            class="price">{{number_format($amazing_product->price2)}} @lang('front-end.product.price_label')</span> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            @endforeach
        </ul>
    </div>
</div>

@section('bottom_script')

    <!-- Hot Deals Timer 1-->
    <script type="text/javascript">
        var dthen1 = new Date({{$amazing[0]->timestamp*1000}});
        start_date = new Date();
        //start_date = Date.parse(start);
        var dnow1 = new Date(start_date);
        if (CountStepper > 0)
            ddiff = new Date((dnow1) - (dthen1));
        else
            ddiff = new Date((dthen1) - (dnow1));
        gsecs1 = Math.floor(ddiff.valueOf() / 1000);

        var iid1 = "countbox_1";
        CountBack_slider(gsecs1, "countbox_1", 1);
    </script>

@endsection