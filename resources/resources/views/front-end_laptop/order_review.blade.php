@extends('layouts.front-end')
@section('top_style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-container col1-layout">
        <!-- Breadcrumbs -->

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span>
                            </li>

                            <li><strong>Checkout</strong></li>
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
                                <h2>@lang('front-end.shopping_cart')</h2>
                            </div>


                            <table id="cart_table" class="table table-bordered">

                                <tr>
                                    <th>شرح محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت واحد</th>
                                    <th colspan="2">قیمت کل</th>
                                </tr>
								<?php
								$total_price = 0;
								$price = 0;
								?>
                                @foreach($cart_data as $key=>$value)

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
                                            <tr>
                                                <td>

                                                    <div style="width:100%" class="cart_div">
                                                        <div class="col-md-4">
                                                            <img class="cart_img"
                                                                 src="{{ $item_data['img'] }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>
                                                                <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}">{{ $item_data['title'] }}</a>
                                                            </p>
                                                            <p>
                                                                <a href="{{route('site.showProductDetails',[$item_data['code_url'],$item_data['title_url']])}}">{{ $item_data['code'] }}</a>
                                                            </p>
                                                            @if(!empty($item_data['color_name']))
                                                                <p style="color:#777">
                                                                    <span>رنگ : </span>
                                                                    <label style="background:#{{ $item_data['color_code'] }}"
                                                                           class="color_product"></label>
                                                                    <span style="padding-right: 5px;">{{ $item_data['color_name'] }}</span>
                                                                </p>
                                                            @endif
                                                            @if(!empty($item_data['service_name']))
                                                                <p style="color:#777">
                                                                    <span>گارانتی : </span> {{ $item_data['service_name'] }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart_number"><p>{{ $value2 }}</p></td>
                                                <td class="cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($item_data['price2']) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($item_data['price2']*$value2) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="review_last">
                                                    <div>
                                                        <a href="{{ route('site.shoppingCart') }}"><span  class="fa fa-refresh"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
											<?php
											$total_price += $item_data['price1'] * $value2;
											$price += $item_data['price2'] * $value2;
											$j++; ?>
                                        @endif

                                    @endforeach

                                @endforeach

                            </table>


                            <p>
                                <span class="icon_item_name"></span><span
                                        style="padding-right:5px;">خطاصه صورت حساب</span>
                            </p>


                            <div class="order_item_price">

								<?php

								$order_data = Session::get('order_data');
								$order_type = array_key_exists('order_type', $order_data) ? $order_data['order_type'] : 0;
								$price2 = ($order_type == 1) ? 10000 : 0;
								?>
                                <div>
                                    <span>جمع کل خرید</span>
                                    <span style="float:left">{{ number_format($total_price) }} تومان</span>
                                </div>


                                <div style="background:#F7FFF7;color:#C0F0C">
                                    <span>هزينه ارسال، بيمه و بسته بندي سفارش</span>
                                    <span style="float:left">
                        @if($order_type==1)
                                            10,000 تومان
                                        @else
                                            پس کرايه
                                        @endif
                    </span>
                                </div>

                                <div>
                                    <span>تخفیف</span>
                                    <span style="float:left">{{ number_format($total_price-$price) }} تومان</span>
                                </div>

                                <div style="background:#FCF5F5;color:#FF6B6B">
                                    <span>مبلغ قابل پرداخت</span>
                                    <span style="float:left">{{ number_format($price+$price2) }} تومان</span>
                                </div>

                            </div>


                            <p>
                                <span class="icon_item_name"></span><span
                                        style="padding-right:5px;">اطلاعات ارسال سفارش</span>
                            </p>


                            <table class="order_location_data">

                                <tr>
                                    <td style="width:50px">
                                        <span><li class="icon icon-review-location"></li></span>
                                    </td>
                                    <td>
                                        <span>این سفارش به</span>
                                        <span>{{ $address->name }}</span>
                                        <span>به آدرس </span>
                                        <span>{{ $address->address }}</span>
                                        <span>به شماره تماس </span>
                                        <span>{{ $address->mobile }}</span>
                                        <span>تحویل میگردد</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:50px">
                                        <span><li class="icon icon-review-car"></li></span>
                                    </td>
                                    <td>
                                        @if($order_type==1)
                                            <span>اين سفارش از طريق تحويل اکسپرس ديجي‌کالا با هزينه 10,000 تومان به شما تحويل داده خواهد شد.</span>
                                        @else
                                            <span>
                                سفارش شما به صورت پس کرايه ارايه مي شود
                            </span>
                                        @endif
                                    </td>
                                </tr>
                            </table>


                            <div class="form-group" style="float: left;margin-top:40px;margin-bottom:30px">

                                <a href="{{route('site.paymentForm')}}" class="btn btn-success">
                                    تایید و ادامه خرید
                                </a>
                            </div>

                        </div>

                    </section>
                </div>
            </div>
        </section>
        <!-- Main Container End -->
    </div>
@endsection