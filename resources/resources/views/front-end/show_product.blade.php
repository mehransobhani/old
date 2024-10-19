@extends('layouts.front-end')
@section('top_style')
    <link href="{{ url('css/rangeslider.css') }}" rel="stylesheet">
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
    <link href="{{asset('css/front-end/font-awesome-5.12.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="main-container col1-layout">
        <!-- Breadcrumbs -->
        {{--<div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span>
                            </li>
                            <li class=""><a title="Go to Home Page"
                                            href="shop_grid.html">Watches</a><span>&raquo;</span>
                            </li>
                            <li><strong>Lorem Ipsum is simply</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>--}}
        <!-- Breadcrumbs End -->

        <!-- Main Container -->
        <div class="main-container col1-layout">
            <div class="container">
                <div class="row">
                    <div class="col-main">
                        <div class="product-view-area">
                            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">

                                @if($product->discounts>0)
                                    <div class="icon-sale-label sale-right">تخفیف</div>
                                @endif
                                <div class="large-image"><a href="upload/{{$product->get_images[0]->url}}"
                                                            class="cloud-zoom" id="zoom1"
                                                            rel="useWrapper: false, adjustY:0, adjustX:20"> <img
                                            class="zoom-img" src="{{asset('upload/'.$product->get_images[0]->url)}}"
                                            alt="products"> </a></div>
                                <div class="flexslider flexslider-thumb">
                                    <ul class="previews-list slides">
                                        @foreach($product->get_images as $image)

                                            <li>
                                                <a href="upload/{{$image->url}}" class='cloud-zoom-gallery'
                                                   rel="useZoom: 'zoom1', smallImage: '{{asset('upload/'.$image->url)}}' ">
                                                    <img src="{{asset('upload/'.$image->url)}}" alt="Thumbnail 2"/>
                                                </a>
                                            </li>

                                        @endforeach
                                    </ul>
                                </div>

                                <!-- end: more-images -->

                            </div>
                            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">

                                <div class="product-name">
                                    <h1>{{$product->title}}</h1>
                                </div>
                                <div class="price-box">
                                    @if($product->product_status!=1)
                                        <span class="regular-price"> <span
                                                class="price">ناموجود</span> </span>
                                    @else
                                        @if(!empty($product->discounts))
                                            <p class="special-price"><span
                                                    class="price-label">Special Price</span>
                                                <span class="price" id="specialPrice"> {{(isset($product->get_colors) && $product->get_colors[0]->price!=0 && $product->get_colors[0]->price!=null) ?number_format($product->get_colors[0]->price-$product->discounts):"طبق سفارش"}}@lang('front-end.product.price_label')</span>
                                            </p>
                                            <p class="old-price"><span
                                                    class="price-label">Regular Price:</span>
                                                <span class="price"  id="regularPrice"> {{(isset($product->get_colors) && $product->get_colors[0]->price!=0 && $product->get_colors[0]->price!=null)?number_format($product->get_colors[0]->price):"طبق سفارش"}} </span>
                                            </p>
                                        @elseif(isset($product->get_colors) && $product->get_colors[0]->price>0)
                                            <span class="regular-price"> <span
                                                    class="price" id="mainPrice"> {{(isset($product->get_colors) && $product->get_colors[0]->price!=0 && $product->get_colors[0]->price!=null)?number_format($product->get_colors[0]->price):"طبق سفارش"}} @lang('front-end.product.price_label')</span> </span>
                                        @else
                                            <span class="regular-price"> <span
                                                    class="price">تماس بگیرید</span> </span>
                                        @endif
                                    @endif
                                </div>
                                <div class="ratings">
                                    {{--<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i
                                            class="fa fa-star-o"></i>--}}
                                    <?php
                                    $product_id = $product->id;
                                    $avg = collect($score_data['score'])->avg();
                                    $avg = substr($avg, 0, 4);
                                    $width = $avg * 20;
                                    ?>
                                    <div class="rating">
                                        <div class="gray">
                                            <div class="red" style="width:{{ $width }}%"></div>
                                        </div>
                                    </div>
                                    {{--<div style="width:100px;margin:5px auto">

                                        <p  style="font-size:10px;"> از {{ $score_data['total'] }} رای </p>
                                    </div>--}}
                                    <p class="rating-links"><a href="#"><span
                                                class="persian">{{ $score_data['total'] }}</span> @lang('front-end.product.reviews')
                                        </a>{{-- <span
                                                class="separator">|</span> <a
                                                href="#">@lang('front-end.product.add_review')</a>--}}</p>
                                    @if($product->product_status==1)
                                        <p class="availability in-stock pull-left">@lang('front-end.product.availability')
                                            <span> @lang('front-end.product.available') </span>
                                        </p>
                                    @else
                                        <p class="availability out-of-stock pull-left">@lang('front-end.product.availability')
                                            <span> ناموجود </span>
                                        </p>
                                    @endif
                                </div>
                                <div class="short-description">
                                    <h2>@lang('front-end.product.overview')</h2>
                                    <p>{!! $product->text!=null?$product->text:'بررسی اجمالی برای این کالا ثبت نشده است!' !!}</p>

                                </div>
                                <div class="product-color-size-area">
                                    <div class="color-area">
                                        <h2 class="saider-bar-title">@lang('front-end.product.color')</h2>
                                        <div class="color">
                                            <ul>
                                                @foreach($product->get_colors as $color)
                                                    <li>
                                                        <input type="radio"
                                                               name="color"
                                                               class="color"
                                                               stock="{{$color->inventory}}"
                                                               price="{{$color->price}}"
                                                               colorName="{{$color->color_name}}"
                                                               specialPrice="{{(isset($color) && $color->price!=0 && $color->price!=null) ?number_format($color->price-$product->discounts).' تومان ' :'طبق سفارش'}}"
                                                               regularPrice="{{(isset($color) && $color->price!=0 && $color->price!=null)?number_format($color->price).' تومان ' :'طبق سفارش'}}"
                                                               mainPrice="{{(isset($color) && $color->price!=0 && $color->price!=null)?number_format($color->price).' تومان ' :'طبق سفارش'}}"
                                                               value="{{$color->id}}"
                                                               {{$product->get_colors[0]->id==$color->id?"checked":""}}
                                                               id="color_{{$color->id}}" title="{{$color->color_name}}"
                                                               style="background-color:{{"#".$color->color_code}}" >
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                    <strong id="colorName">
                                        {{$product->get_colors[0]->color_name}}

                                    </strong>
                                </div>
                                <div class="product-variation">
                                        @if(isset($product->get_colors) && $product->get_colors[0]->price>0)
                                        <form action="{{route('site.addToCart')}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="color_id" value="{{$product->get_colors?$product->get_colors[0]->id:0}}" id="color_id">
                                            <div class="cart-plus-minus">
                                                <label for="qty">@lang('front-end.product.quantity') :</label>
                                                <div class="numbers-row">
                                                    <div   class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                                                    <input type="text" class="qty persian" title="Qty" value="1"
                                                           maxlength="12"
                                                           id="qty"
                                                           disabled
                                                           name="qty">
                                                    <div onClick=""
                                                         class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                                                </div>
                                            </div>
                                            <button class="button pro-add-to-cart" title="Add to Cart"
                                                    type="submit"><span><i
                                                        class="fa fa-shopping-cart"></i> @lang('front-end.product.add_to_cart')</span>
                                            </button>
                                        </form>
                                    @else
                                        <div class="jtv-banner-box">
                                            <a class="button"
                                               href="{{route('site.showContact')}}"><i
                                                    class="fa fa-phone-alt"></i><span> تماس بگیرید</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                {{--<div class="product-cart-option">
                                    <ul>
                                        <li><a href="#"><i
                                                        class="fa fa-heart"></i><span>@lang('front-end.product.wish_list')</span></a>
                                        </li>
                                        <li><a href="#"><i
                                                        class="fa fa-retweet"></i><span>@lang('front-end.product.compare')</span></a>
                                        </li>
                                        <li><a href="#"><i
                                                        class="fa fa-envelope"></i><span>@lang('front-end.product.email_to_friend')</span></a>
                                        </li>
                                    </ul>

                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div class="product-overview-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="product-tab-inner">
                                        <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                            <li class="active">
                                                <a href="#description"
                                                   data-toggle="tab"> @lang('front-end.product.description') </a>
                                            </li>
                                            <li>
                                                <a href="#product_spec"
                                                   data-toggle="tab">@lang('front-end.product.spec')</a>
                                            </li>
                                            <li>
                                                <a href="#reviews"
                                                   data-toggle="tab">@lang('front-end.product.reviews')</a>
                                            </li>
                                            {{--<li><a href="#custom_tabs" data-toggle="tab">Custom Tab</a></li>--}}
                                        </ul>
                                        <div id="productTabContent" class="tab-content">
                                            <div class="tab-pane fade in active" id="description">
                                                <div class="std">
                                                    @if($review)
                                                        {!! $review->review_tozihat !!}
                                                    @else
                                                        <span>بررسی تخصصی برای این محصول ثبت نشده است!</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div id="reviews" class="tab-pane fade"
                                                 style="padding-bottom: 2px!important;">
                                                @include('front-end.product_comment')
                                            </div>

                                            <div class="tab-pane fade" id="product_spec">
                                                <div class="box-collateral box-tags">

                                                    <table class="table table-striped">
                                                        @if(!empty($item_value))
                                                            @foreach($items as $item)

                                                                @if($item->isItemValueFilled($item->get_child_item,$product->id))

                                                                    <tr>
                                                                        <th colspan="2"
                                                                            style="background: #1b1c1f;color: #fff">{{$item->name}}</th>
                                                                    </tr>

                                                                    @foreach($item->get_child_item as $productItem)

                                                                        @if(array_key_exists($productItem->id,$item_value)&&$item_value[$productItem->id]!=null)

                                                                            <tr>
                                                                                <td style="width: 20%;">{{$productItem->name}}</td>
                                                                                <td>
                                                                                    @if($productItem->filed==1)
                                                                                        {{$item_value[$productItem->id]}}
                                                                                    @elseif($productItem->filed==2)
                                                                                        @if($item_value[$productItem->id]==1)
                                                                                            بله
                                                                                        @elseif($item_value[$productItem->id]==2)
                                                                                            خیر
                                                                                        @endif
                                                                                    @elseif($productItem->filed==3)
                                                                                        @php
                                                                                            $descItem=explode('!@#',$item_value[$productItem->id]);
                                                                                            foreach ($descItem as $key=>$value){
                                                                                                echo $value.'<br/>';
                                                                                            }
                                                                                        @endphp
                                                                                    @endif
                                                                                </td>
                                                                            </tr>

                                                                        @endif

                                                                    @endforeach

                                                                @endif

                                                            @endforeach
                                                        @else
                                                            <span>برای این محصول ویژگی ثبت نشده است!</span>
                                                        @endif
                                                    </table>

                                                </div>
                                            </div>

                                            {{--<div class="tab-pane fade" id="custom_tabs">
                                                <div class="product-tabs-content-inner clearfix">
                                                    <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                      simply dummy text of the printing and typesetting industry. Lorem Ipsum
                      has been the industry's standard dummy text ever since the 1500s, when
                      an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the
                      leap into electronic typesetting, remaining essentially unchanged. It
                      was popularised in the 1960s with the release of Letraset sheets
                      containing Lorem Ipsum passages, and more recently with desktop
                      publishing software like Aldus PageMaker including versions of Lorem
                      Ipsum.</span></p>
                                                </div>
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('front-end.related_products')
                </div>
            </div>
        </div>

        <!-- Main Container End -->
    </div>


    <style>
        input[type="radio"]{
            appearance: none;
            border: 1px solid #d3d3d3;
            width: 30px;
            height: 30px;
            content: none;
            outline: none;
            margin: 0;
        }

        input[type="radio"]:checked {
            appearance: none;
            outline: none;
            padding: 0;
            content: none;
            border: none;
        }

        input[type="radio"]:checked::before{
            position: absolute;
            color: green !important;
            height: 30px;
            content: "\00A0\2713\00A0" !important;
            border: 1px solid #d3d3d3;
            font-weight: bolder;
            font-size: 21px;
        }


    </style>
@endsection

@section('bottom_script')

    <!--cloud-zoom js -->
    <script type="text/javascript" src="{{asset('js/front-end/cloud-zoom.js')}}"></script>
    <!-- flexslider js -->
    <script type="text/javascript" src="{{asset('js/front-end/jquery.flexslider.js')}}"></script>

    <script>
        $(document).on("change","input[name='color']",function (){
            $("#specialPrice").text($(this).attr("specialPrice"));
            $("#regularPrice").text($(this).attr("regularPrice"));
            $("#mainPrice").text($(this).attr("mainPrice"));
            $("#colorName").text($(this).attr("colorName"));
            $("#qty").val(0)
            $("#color_id").val($(this).val())
        })
        $(document).on("click",".inc",function (){
            var result = document.getElementById('qty');
            var qty = parseInt(result.value);
            let stock=parseInt($("input[name='color']:checked").attr("stock"));

            if( !isNaN( qty ) && qty<stock) result.value++;

            return false;
        })
        $(document).on("click",".dec",function (){
            var result = document.getElementById('qty');
            var qty = result.value;
            if( !isNaN( qty ) && qty>0 )
                result.value--;
            return false;

        })


        function lightOrDark(color) {

            // Variables for red, green, blue values
            var r, g, b, hsp;

            // Check the format of the color, HEX or RGB?
            if (color.match(/^rgb/)) {

                // If HEX --> store the red, green, blue values in separate variables
                color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

                r = color[1];
                g = color[2];
                b = color[3];
            } else {

                // If RGB --> Convert it to HEX: http://gist.github.com/983661
                color = +("0x" + color.slice(1).replace(
                    color.length < 5 && /./g, '$&$&'));

                r = color >> 16;
                g = color >> 8 & 255;
                b = color & 255;
            }

            // HSP (Highly Sensitive Poo) equation from http://alienryderflex.com/hsp.html
            hsp = Math.sqrt(
                0.299 * (r * r) +
                0.587 * (g * g) +
                0.114 * (b * b)
            );

            // Using the HSP value, determine whether the color is light or dark
            if (hsp > 127.5) {

                return 'light';
            } else {

                return 'dark';
            }
        }
    </script>

    <script type="text/javascript" src="{{ url('js/rangeslider.js') }}"></script>
    <script>
        var textContent = ('textContent' in document) ? 'textContent' : 'innerText';

        function valueOutput(element) {
            var value = element.value;
            $("#output_" + element.id).html(element.value);
            $("#" + element.id).value = element.value;
        };
        $('[data-rangeslider]').rangeslider({


            polyfill: false,


            onInit: function () {
                valueOutput(this.$element[0]);
            },
            onSlideEnd: function (position, value) {
                valueOutput(this.$element[0]);
            }


        });
        add_advantages = function () {
            var n = document.getElementsByClassName('advantages').length + 1;
            var id = 'advantages_' + n;
            var div = '<div class="form-group" id="' + id + '">' +
                '<input type="text" style="margin-top:20px;"  class="form-control  advantages" name="advantages[]">' +
                '<div class="icon-form-add2" onclick="add_advantages()">+</div>' +
                '<div class="icon-form-remove2" onclick="remover_advantages(' + n + ')">-</div>' +
                '</div>';
            $("#advantages_box").append(div);
        };
        remover_advantages = function (id) {
            $("#advantages_" + id).remove();
        };
        add_disadvantages = function () {
            var n = document.getElementsByClassName('disadvantages').length + 1;
            var id = 'disadvantages_' + n;
            var div = '<div class="form-group" id="' + id + '">' +
                '<input type="text" style="margin-top:20px;"  class="form-control  disadvantages" name="disadvantages[]">' +
                '<div class="icon-form-add2" onclick="add_disadvantages()">+</div>' +
                '<div class="icon-form-remove2" onclick="remover_disadvantages(' + n + ')">-</div>' +
                '</div>';
            $("#disadvantages_box").append(div);
        };
        remover_disadvantages = function (id) {
            $("#disadvantages_" + id).remove();
        }

        <?php

        $url2 = url('site/ajax_get_tab_data');
        ?>
        $('.pagination a').click(function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var url = url.split('page=');
            var product_id = '<?= $product->id ?>';
            //alert(product_id);
            if (url.length == 2) {
                //alert(product_id);
                $("#loading_comment").show();
                $("#comment_box").hide();

                $.ajaxSetup(
                    {
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $.ajax({
                    url: '{{ $url2 }}?page=' + url[1],
                    type: 'POST',
                    data: 'tab_id=comment&product_id=' + product_id,
                    success: function (data) {
                        $("#comment_box").show();
                        $("#loading_comment").hide();
                        $("#comment_box").html(data);
                    }, error: function (error) {
                        console.log(error);
                    }
                });
            }
        });

    </script>

@endsection
