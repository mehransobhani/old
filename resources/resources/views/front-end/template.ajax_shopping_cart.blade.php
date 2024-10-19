@if(sizeof($cart_data)==0)

    <div class="alert alert-warning" role="alert">@lang('front-end.shopping_cart.empty')</div>

@else

    <div id="shopping_cart">
        <div class="order-detail-content">
            <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                    <thead>
                    <tr>
                        <th class="cart_product">@lang('front-end.shopping_cart.product_image')</th>
                        <th>@lang('front-end.shopping_cart.product_desc')</th>
                        {{--<th>@lang('front-end.shopping_cart.product_availability')</th>--}}
                        <th>@lang('front-end.shopping_cart.unit_price')</th>
                        <th>@lang('front-end.shopping_cart.qty')</th>
                        <th>@lang('front-end.shopping_cart.product_total')</th>
                        <th class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php
					$total_price = 0;
					$total_discount = 0;
					?>
                    @foreach($cart_data as $key=>$value)
                        @foreach($value['product_data'] as $key2=>$value2)
							<?php
							$sc = explode('_', $key2);
							$service_id = $sc[0];
							$color_id = $sc[1];
							$item_data = \App\Cart::get_data($key, $service_id, $color_id);
							$index = 1;
							//var_dump($item_data);
							?>
                            <tr>
                                <td class="cart_product">
                                    <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}">
                                        <img src="{{$item_data['img']}}" alt="Product"/>
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name">
                                        <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}">{{$item_data['title']}}</a>
                                    </p>
                                    @if($item_data['color_code'])
                                        <small>
                                            <a href="#">@lang('front-end.product.color')
                                                : {{$item_data['color_name']}}</a>
                                        </small>
                                        <br>
                                    @endif
                                </td>
                                {{--<td class="availability in-stock"><span class="label">In stock</span>
                                </td>--}}
                                <td class="price">
                                                            <span class="special-price">
                                                                <span class="price">
                                                                    {{number_format($item_data['price2'])}} @lang('front-end.product.price_label')
                                                                </span>
                                                            </span>
                                    <span class="old-price">
                                                                <spann class="price">  {{number_format($item_data['price1'])}} </span>
                                    </span>
                                    {{--<span>{{number_format($item_data['price2'])}}</span>--}}
                                </td>
                                <td class="qty">
                                    <input class="form-control input-sm" type="text"
                                           id="number_product_{{$index}}"
                                           value="{{$value2}}"><i class="fa fa-save"
                                                                  onclick="set_number_product('{{$key}}','{{$service_id}}','{{$color_id }}','{{$index}}')">
                                    </i>
                                </td>
                                <td class="price">
                                    <span>{{number_format($item_data['price2']*$value2)}}</span>
                                </td>
                                <td class="action">
                                    <a href="#"
                                       onclick="del_product('{{$key}}','{{$service_id}}','{{$color_id}}')">
                                        <i class="icon-close"></i>
                                    </a>
                                </td>
                            </tr>
							<?php
							$index++;
							$total_price += $item_data['price2'] * $value2;
							$total_discount += ($item_data['price1'] - $item_data['price2']) * $value2;

							?>
                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2" rowspan="3">
                            {{--<lable for="shipping_id">@lang('front-end.shipping.select')</lable>
                            <select name="shipping_id" id="shipping_id" class="form-control">
                                <option value="">@lang('front-end.form.please_select')</option>
                                @foreach($shipping as $address)

                                    <option value="{{$address->id}}">{{$address->name.' - '.$address->get_ostan->ostan_name.'، '.$address->get_shahr->shahr_name.'، '.$address->address}}</option>

                                @endforeach
                            </select>
                            <br>

                            <a class="my_button" href="{{route('site.addShipping')}}">
                                <i class="fa fa-plus"></i> @lang('front-end.shipping.add_btn')
                            </a>--}}
                        </td>
                        <td colspan="2">@lang('front-end.shopping_cart.total_price')</td>
                        <td colspan="2" class="persian">
                            {{number_format($total_price+$total_discount)}}
                            @lang('front-end.product.price_label')
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">@lang('front-end.shopping_cart.total_discount')</td>
                        <td colspan="2" class="persian">
                            {{number_format($total_discount)}}
                            @lang('front-end.product.price_label')
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>@lang('front-end.shopping_cart.total')</strong>
                        </td>
                        <td colspan="2" class="persian"><strong>{{number_format($total_price)}}
                                @lang('front-end.product.price_label')</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="cart_navigation">
                <a class="continue-btn" href="{{route('site.homepage')}}">
                    <i class="fa fa-arrow-left"> </i>&nbsp; @lang('front-end.shopping_cart.continue_shopping')
                </a>
                <a class="checkout-btn" href="{{route('site.shipping')}}">
                    <i class="fa fa-check"></i> @lang('front-end.shopping_cart.checkout')
                </a>
            </div>
        </div>
    </div>

@endif