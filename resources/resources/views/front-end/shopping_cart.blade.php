@extends('layouts.front-end')
@section('top_style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
@endsection
@section('content')
    <style>
        /* تنظیمات پیش فرض جدول */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* مدیا کوئری برای صفحات کوچکتر از 768 پیکسل (دستگاه‌های موبایل) */
        @media only screen and (max-width: 768px) {
            /* اجبار جدول به نمایش به صورت بلوک */
            table, th, td {
                display: block;
            }

            /* مخفی کردن سرستون‌های جدول (th) */
            th {
                display: none;
            }

            /* استایل دهی به ردیف‌های جدول (tr) */
            td {
                border-bottom: 1px solid #ddd;
                position: relative;
                padding-left: 50%;
                width: 100%!important;
            }
            .styled_select select{
                position: static!important;
            }
            .last div span{
                position: static!important;
            }
            /* استایل دهی به سلول‌های جدول (td) */
            td:before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding: 8px;
                font-weight: bold;
                text-align: right;
            }
            tr{
                width: 100%;
                display: block;
            }
            tbody{
                width: 100%;
                display: block;
            }
        }


    </style>

    <div class="main-container col1-layout">
        <!-- Main Container -->
        <section class="main-container col1-layout">
            <div class="main container">
                <div class="col-main">
                    <div class="cart">

                        <div class="page-content page-order">
                            <div class="page-title">
                                <h2>@lang('front-end.shopping_cart')</h2>
                            </div>

                            <div id="product_cart">

                                @if(sizeof($cart_data)==0)

                                    <div class="alert alert-warning"
                                         role="alert">@lang('front-end.shopping_cart.empty')</div>

                                @else

                                    <div style="width:95%;margin: 50px auto">
                                        <p>افزودن کالاها به سبد خرید به معنی رزرو کالا برای شما نیست. برای ثبت سفارش
                                            باید
                                            مراحل بعدی خرید را تکمیل نمایید.</p>
                                        <a href="{{ route('site.shipping') }}" class="btn btn-success"
                                           style="float:left;margin-top:5px;margin-bottom: 30px;"><span>ادامه ثبت سفارش</span>
                                            <span class="fa fa-arrow-left"></span></a>

                                        <div style="clear: both;"></div>
                                        <div class="table-responsive">
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
                                                                <td class="styled_select">
                                                                    <select id="number_product_{{ $j }}" style="position:static;"
                                                                            class="form-control input-sm"
                                                                            onchange="set_number_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}','{{ $j }}')">
                                                                        @for($i=1;$i<=($item_data["color_stock"]<11?$item_data["color_stock"]:11);$i++)
                                                                            <option @if($value2==$i) selected="selected"
                                                                                    @endif  value="{{ $i }}">{{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                </td>
                                                                <td class="cart_price">
                                                                    <span class="p1">{{ number_format($item_data['color_price']) }}</span>
                                                                    <span class="p2">تومان</span>
                                                                </td>
                                                                <td class="cart_price">
                                                                    <span class="p1">{{ number_format($item_data['color_price']*$value2) }}</span>
                                                                    <span class="p2">تومان</span>
                                                                </td>
                                                                <td class="last">
                                                                    <div>
                                                                      
                                                                <span onclick="del_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}')"
                                                                      class="fa fa-remove"></span>
                                                                      <h6 onclick="del_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}')">
                                                                          حذف
                                                                      </h6>
                                                                     </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $total_price += $item_data['color_price'] * $value2;
                                                            $price += $item_data['color_price'] * $value2;
                                                            ?>
                                                            <?php $j++; ?>
                                                        @endif

                                                    @endforeach

                                                @endforeach

                                            </table>
                                        </div>


                                        <div style="width:100%;" id="footer_cart">
                                            <div class="col-md-5"></div>

                                            <div class="col-md-7">
                                                <div class="cart_price2">
                                                    <div>

                                                        <ul class="list-inline">
                                                            <li style="margin-right:15px;">جمع کل خرید شما :</li>
                                                            <li style="float:left;margin-left:10px"><span
                                                                        class="p1">{{ number_format($total_price) }}</span>
                                                                تومان
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div style="background:#F7FFF7;">
                                                        <ul class="list-inline">
                                                            <li style="margin-right:15px;color:#4CAF50">مبلغ قابل پرداخت
                                                                :
                                                            </li>
                                                            <li style="float:left;color:#4CAF50;margin-left:10px"><span
                                                                        class="p1">{{ number_format($price) }}</span>
                                                                تومان
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <a href="{{ route('site.shipping') }}" class="btn btn-success"
                                                   style="float:left;margin-top:15px;margin-bottom: 30px;"><span>ادامه ثبت سفارش</span>
                                                    <span class="fa fa-arrow-left"></span></a>
                                            </div>
                                        </div>

                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('bottom_script')

    <script>
        <?php
            $url = route('site.deleteProductFromShoppingCart');
            $url2 = route('site.changeProductQTYOnShoppingCart');
            ?>
            del_product = function (p_id, s_id, c_id) {
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'service_id=' + s_id + '&product_id=' + p_id + '&color_id=' + c_id,
                success: function (data) {
                    $("#product_cart").html(data);
                }
            });
        };
        set_number_product = function (p_id, s_id, c_id, id) {
            var number = document.getElementById('number_product_' + id);
            if (number) {
                number = number.value;
                $.ajaxSetup(
                    {
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                $.ajax({
                    url: '{{ $url2 }}',
                    type: 'POST',
                    data: 'service_id=' + s_id + '&product_id=' + p_id + '&color_id=' + c_id + '&number=' + number,
                    success: function (data) {
                        console.log(data);
                        $("#product_cart").html(data);
                    }
                });
            }
        }
    </script>

@endsection
