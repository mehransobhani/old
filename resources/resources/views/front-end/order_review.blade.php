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
            .review_last div span{
           position: static!important;
            }
            }
        }


    </style>
    
    <div class="main-container col1-layout">
        <!-- Breadcrumbs -->

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="Go to Home Page" href="/">خانه</a><span>&raquo;</span>
                            </li>

                            <li><strong>خلاصه صورت حساب</strong></li>
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
                                <h2>خلاصه صورت حساب</h2>
                            </div>

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
                                $limit = 0;
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
                                            
                                            
                                             $color = \App\Color::find($color_id);
                                            if ($color) {
                                                $product = \App\Product::find($color->product_id);
                                                if ($product && $product->limited == 1) {
                                                    $limit = 1;
                                                }
                                            }
                                            
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
                                                                    <label
                                                                        style="background:#{{ $item_data['color_code'] }}"
                                                                        class="color_product"></label>
                                                                    <span
                                                                        style="padding-right: 5px;">{{ $item_data['color_name'] }}</span>
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
                                                        <span
                                                            class="p1">{{ number_format($item_data['color_price']) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>
                                                        <span
                                                            class="p1">{{ number_format($item_data['color_price']*$value2) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="review_last">
                                                    <div style="background:transparent;">
                                                        <a href="{{ route('site.shoppingCart') }}"><span
                                                                class="fa fa-refresh"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                                <?php
                                                $total_price += $item_data['color_price'] * $value2;
                                                $price += $item_data['color_price'] * $value2;
                                                $j++; ?>
                                        @endif

                                    @endforeach

                                @endforeach

                            </table>
</div>

                            <p>
                                <span class="icon_item_name"></span><span
                                    style="padding-right:5px;">خلاصه صورت حساب</span>
                            </p>


                            <div class="order_item_price">

                                <?php

                                $order_data = Session::get('order_data');
                                $order_type = array_key_exists('order_type', $order_data) ? $order_data['order_type'] : 0;
                                $price2 = session('shipping_price');
                                ?>
                                <div>
                                    <span>جمع کل خرید</span>
                                    <span style="float:left">{{ number_format($total_price) }} تومان</span>
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
                                        <h5 style="text-align: right!important;">
                                            ✅ شرایط ارسال کالا
                                        </h5>
                                        <div>
                                            <ul>
                                                <li style="list-style: none;margin: 5px 2px;">
                                        <span>
                                        ۱. نحوه ارسال کالا پس از پرداخت صورتحساب با هماهنگی و بنا به درخواست خریدار از طریق باربری، تیپاکس، پست، اسنپ و یا تحویل حضوری درب انبار تجهیزلند امکان‌پذیر می‌باشد.
                                        </span>
                                                </li>
                                                <li style="list-style: none;margin: 5px 1px;">
                                       <span>
                                        ۲. هزینه ارسال کالا در استان تهران و حومه توسط کارشناسان تجهیزلند پس از پرداخت صورت حساب کالا به خریدار اعلام می‌گردد و در کلیه شهرستان‌ها به صورت پس کرایه می‌باشد.
                                        </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div style="padding: 10px;margin: 10px 0;">

   @if($limit)
                                    <span class="text-danger" id="valid" style="font-weight: bold">
قبل از تایید و پرداخت صورت حساب، برای استعلام موجودی این محصول با کارشناسان تجهیزلند تماس بگیرید.
                                    </span>
                                @endif
                            </div>
                            <div style="padding: 10px;margin: 10px 0;display: flex">
                                <div>
                                    <h5>
                                        <input type="checkbox" id="role">
                                    </h5>
                                </div>
                                <div style="align-content: center;display: grid;margin-right: 10px">
                                    <div style="display: flex">
                                        <h5>با</h5>
                                        <h5>
                                            <a href="{{ route('rule') }}" style="color: #5cb85c;margin: 0 5px;">
                                                قوانین
                                            </a>
                                        </h5>
                                        <h5>سایت موافقم </h5>
                                    </div>
                                    <span class="text-danger hidden" id="valid"  style="font-weight: bold">
                                          برای ثبت سفارش موافقت با قوانین سایت الزامیست
                                    </span>
                                </div>
                            </div>

                            <div  class="form-group" style="float: left;margin-top:40px;margin-bottom:30px" >
   @if(!$limit)

                                <a  id="payment" class="btn btn-success" disabled="disabled">
                                    تایید و ادامه خرید
                                </a>
                                 @endif
                            </div>

                        </div>

                    </section>
                </div>
            </div>
        </section>
        <!-- Main Container End -->
    </div>
<style>
    @media screen and (max-width:860px){
        td{
            text-align: left;
        }
        #cart_table p , cart_table a {
            position:static;
        }
    }
</style>
@endsection
@section('bottom_script')
    <script type="text/javascript">
        $(document).on("click","#role",function (){
            if($(this).prop("checked") )
            {
                $("#payment").attr("href","{{route('site.paymentForm')}}");
                $("#payment").removeAttr("disabled");
            }
            else{
                $("#payment").removeAttr("href");
                $("#payment").attr("disabled","disabled");

            }

        })
        $(document).on("click","#payment",function (){
            if(!$("#role").prop("checked") )
            {
                $("#valid").removeClass("hidden");

            }
        })
    </script>
@endsection
