<div class="search_body">

    <div style="width:97%;margin:auto;">

        {{--{{sizeof($data['product'])}}--}}


        <?php

        function get_score($data)
        {
            $s = 0;
            foreach ($data as $k => $v) {

                $a = explode('@#', $v->value);
                foreach ($a as $key => $value) {
                    if (!empty($value)) {
                        $b = explode('_', $value);
                        if (is_array($b)) {
                            if (sizeof($b) == 2) {
                                $s += $b[1];
                            }
                        }

                    }
                }
            }
            if ($s > 0) {
                $n = sizeof($data) * 5;
                $s = $s / $n;
                $s = substr($s, 0, 3);
            }

            return $s;
        }

        ?>


        <div class="product-grid-area">

            <ul class="products-grid">
                @foreach($data['product'] as $product)

                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="product-item">
                            <div class="item-inner">
                                <div class="product-thumbnail">
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
                                        @if($product->price>0)
                                            <a type="button" class="add-to-cart-mt"
                                               href="{{route('site.addToCartByButton',[$product->id])}}"><i
                                                        class="fa fa-shopping-cart"></i><span> @lang('front-end.product.add_to_cart')</span>
                                            </a>
                                        @else
                                            <a type="button" class="add-to-cart-mt"
                                               href="{{route('site.showContact')}}"><i
                                                        class="fa fa-phone-alt"></i><span> تماس بگیرید</span>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="pr-info-area">


                                        <div class="product_item_compare"
                                             onclick="add_compare_product('<?= $product->id ?>','{{ $product->title }}','{{ $product->get_img->url }}')">
                                            <span class="checkbox2" id="compare_{{ $product->id  }}"></span>
                                            <span style="padding-top:5px">مقایسه</span>
                                        </div>

                                        <div class="pr-button">
                                            <div class="mt-button add_to_wishlist"><a
                                                        href="{{route('site.addToWishList',[$product->id])}}"
                                                        title="افزودن به علاقه مندی"> <i
                                                            class="fa fa-heart"></i> </a></div>
                                            <div class="mt-button add_to_compare"><a title="مقایسه"
                                                                                     onclick="add_compare_product('<?= $product->id ?>','{{ $product->title }}','{{ $product->get_img->url }}')">
                                                    <i class="fa fa-signal"></i> </a></div>
                                            <!--<div class="mt-button quick-view"><a href="quick_view.html">
                                                    <i class="fa fa-search"></i> </a></div>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="info-inner">
                                        <div class="item-title">
                                            <a title="{{$product->title}}"
                                               href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}">
                                                {{$product->title}}
                                            </a>
                                        </div>
                                        <div class="item-content">
                                            {{--<div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star-o"></i> <i
                                                        class="fa fa-star-o"></i></div>--}}
                                            <div class="item-price">
                                                <div class="price-box">
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
                                                                    class="price">بدون قیمت</span> </span>
                                                    @endif
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

        <div style="width:100%;float:right;" align="center">

            {!!  str_replace('ajax/set_filter_product',$cat_url,$data['product']->links()) !!}
        </div>

        @if(sizeof($data['product'])==0)

            <div style="clear:both;padding-top: 30px;"></div>
            <div style="background-color: #F7F8FA;border: 1px dashed #C7C7C7;text-align:center;width:97%;margin:auto;padding-top:14px;padding-bottom:8px">
                <p>محصولی برای نمایش یافت نشد</p>
            </div>

        @endif

        <div style="clear:both;padding-top: 30px;"></div>


    </div>

</div>

<script>
    <?php
    $url = url('ajax/set_filter_product');
    ?>
    $('.pagination a').click(function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var url = url.split('page=');
        if (url.length == 2) {
            var ajax_url = '<?= $url ?>?page=' + url[1];
            send_data(ajax_url);
        }
    });
    $('.product-item').hover(function () {

            $('.product_item_compare', this).show();
        },
        function () {
            $('.product_item_compare', this).hide();
        });
</script>