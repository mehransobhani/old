<div class="mini-cart">
    <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
        <a
                href="{{route('site.shoppingCart')}}">
            <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
            <div class="shoppingcart-inner hidden-xs"><span
                        class="cart-title">@lang('front-end.shopping_cart')</span> <span class="cart-total"><span
                            class="persian">{{\App\Cart::count()}} </span>@lang('front-end.shopping_cart.items')</span>
            </div>
        </a>
    </div>
    <div>
        @if(\App\Cart::count()>0)
            <div class="top-cart-content">
                <div class="block-subtitle hidden-xs">آیتم(های) افزوده شده اخیر</div>
                <ul id="cart-sidebar" class="mini-products-list">
					<?php
					$total_price = 0;
					$price = 0;
					?>
                    @foreach(\App\Cart::get() as $key=>$value)
						<?php

						$product_data = array_key_exists('product_data', $value) ? $value['product_data'] : array();
						$j = 1;
						?>
                        @foreach($product_data as $key2=>$value2)
							<?php
							$s_c = explode('_', $key2);
							$service_id = $s_c[0];
							$color_id = $s_c[1];
							$item_data = \App\Cart::get_data($key, $service_id, $color_id);
							?>
                            @if($item_data)
                                <li class="item odd">
                                    <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}"
                                       title="{{ $item_data['title'] }}" class="product-image">
                                        <img src="{{ $item_data['img'] }}" alt="{{ $item_data['title'] }}" width="65">
                                    </a>
                                    <div class="product-details">
                                        {{--<a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>--}}
                                        <p class="product-name">
                                            <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}">{{ $item_data['title'] }}</a>
                                        </p>

                                        <strong class="persian">{{$value2}}</strong> * <span class="price persian">{{ number_format($item_data['price2']*$value2) }}</span>
                                    </div>
                                </li>
								<?php
								$total_price += $item_data['price1'] * $value2;
								$price += $item_data['price2'] * $value2;
								?>
								<?php $j++; ?>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                <div class="top-subtotal">&nbsp;<span class="price persian">جمع کل: {{number_format($total_price)}}</span></div>
                <div class="actions">
                    <a class="btn-checkout" href="{{route('site.payment')}}"><i class="fa fa-check"></i><span>پرداخت</span>
                    </a>
                    <a class="view-cart" href="{{route('site.shoppingCart')}}"><i class="fa fa-shopping-cart"></i>
                        <span>سبد خرید</span></a>
                </div>
            </div>
        @endif
    </div>
</div>