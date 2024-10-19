@extends('layouts.front-end')


@section('content')

    <!-- Breadcrumbs -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>

                        <li><strong>Checkout</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Main Container -->
    <section class="main-container col2-right-layout">
        <div class="main container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12">


                    <div class="page-content checkout-page">

                        <div class="page-title">
                            <h2>Checkout</h2>
                        </div>

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
                                            <th class="action"><i class="fa fa-shopping-basket"></i></th>
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
                                                        {{--<span>{{number_format($item_data['price2'])}}</span>--}}
                                                    </td>
                                                    <td class="qty persian">{{$value2}}</td>
                                                    <td class="price">
                                                        <span>{{number_format($item_data['price2']*$value2)}}</span>
                                                    </td>
                                                    <td class="action">
                                                        <a href="{{route('site.shoppingCart')}}">
                                                            <i class="icon-refresh"></i>
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
                                            <td colspan="2">
                                                <strong>@lang('front-end.shopping_cart.total')</strong>
                                            </td>
                                            <td colspan="2" class="persian">
                                                <strong>{{number_format($total_price)}}
                                                    @lang('front-end.product.price_label')</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="right sidebar col-sm-3 col-xs-12">
                    <div class="sidebar-checkout block">
                        <div class="sidebar-bar-title">
                            <h3>Your Checkout</h3>
                        </div>
                        <div class="block-content">
                            <dl>
                                <dt class="complete"> Billing Address <span class="separator">|</span> <a href="#">Change</a> </dt>
                                <dd class="complete">
                                    <address>
                                        Deo Jone<br>
                                        Company Name<br>
                                        7064 Lorem <br>
                                        Ipsum <br>
                                        Vestibulum 0 666/13<br>
                                        United States<br>
                                        T: 12345678 <br>
                                        F: 987654
                                    </address>
                                </dd>
                                <dt class="complete"> Shipping Address <span class="separator">|</span> <a href="#">Change</a> </dt>
                                <dd class="complete">
                                    <address>
                                        Deo Jone<br>
                                        Company Name<br>
                                        7064 Lorem <br>
                                        Ipsum <br>
                                        Vestibulum 0 666/13<br>
                                        United States<br>
                                        T: 12345678 <br>
                                        F: 987654
                                    </address>
                                </dd>
                                <dt class="complete"> Shipping Method <span class="separator">|</span> <a href="#">Change</a> </dt>
                                <dd class="complete"> Flat Rate - Fixed <br>
                                    <span class="price">$15.00</span> </dd>
                                <dt> Payment Method </dt>
                            </dl>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- Main Container End -->

@endsection