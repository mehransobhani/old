<div class="container">
    <div class="special-products">
        <div class="page-header">
            <h2>محصولات پربازدید</h2>
        </div>
        <div class="special-products-pro">
            <div class="slider-items-products">
                <div id="special-products-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4">
                        @foreach($view_product as $product)

                            <div class="product-item">
                                <div class="item-inner">
                                    <div class="product-thumbnail">
                                        @if($product->discounts>0)
                                            <div class="icon-sale-label sale-right">تخفیف</div>
                                        @endif
                                        {{--<div class="icon-sale-label sale-left">Sale</div>
                                        <div class="icon-new-label new-right">New</div>--}}
                                        <div class="pr-img-area"><a title="{{$product->title}}"
                                                                    href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}">
                                                <figure><img class="first-img"
                                                             src="{{asset('upload/'.$product->get_img->url)}}"
                                                             alt=""> <img class="hover-img"
                                                                          src="{{asset('upload/'.$product->get_img->url)}}"
                                                                          alt=""></figure>
                                            </a>
                                            <a type="button" class="add-to-cart-mt"
                                               href="{{route('site.addToCartByButton',[$product->id])}}"><i
                                                        class="fa fa-shopping-cart"></i><span> @lang('front-end.product.add_to_cart')</span>
                                            </a>
                                        </div>
                                        <div class="pr-info-area">
                                            <div class="pr-button">
                                                <div class="mt-button add_to_wishlist"><a
                                                            href="{{route('site.addToWishList',[$product->id])}}"
                                                            title="افزودن به علاقه مندی"> <i
                                                                class="fa fa-heart"></i> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-info">
                                        <div class="info-inner">
                                            <div class="item-title"><a title="{{$product->title}}"
                                                                       href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}">{{$product->title}}</a>
                                            </div>
                                            <div class="item-content">
                                                {{--<div class="rating"><i class="fa fa-star"></i> <i
                                                            class="fa fa-star"></i> <i
                                                            class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i></div>--}}
                                                <div class="item-price">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>