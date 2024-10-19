@extends('layouts.front-end')

@section('top_style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="main-container col2-left-layout">
        <div class="container">
            <div class="row">
                <div class="col-main col-sm-9 col-xs-12 col-sm-push-3" id="show_product">
                    {{--<div class="category-description std">
                        <div class="slider-items-products">
                            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col1 owl-carousel owl-theme">

                                    <!-- Item -->
                                    <div class="item"> <a href="#x"><img alt="" src="images/cat-slider-img1.jpg"></a>
                                        <div class="inner-info">
                                            <div class="cat-img-title"> <span>Our new range of</span>
                                                <h2 class="cat-heading"><strong>Smartphone</strong></h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                                                <a class="info" href="#">Shop Now</a> </div>
                                        </div>
                                    </div>
                                    <!-- End Item -->

                                    <!-- Item -->
                                    <div class="item"> <a href="#x"><img alt="" src="images/cat-slider-img2.jpg"></a> </div>

                                    <!-- End Item -->

                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <div class="shop-inner">
                        <div class="page-title">
                            <h2>{{$category2->cat_name}}</h2>
                        </div>
                        {{--<div class="toolbar">
                            <div class="view-mode">
                                <ul>
                                    <li class="active"> <a href="shop_grid.html"> <i class="fa fa-th-large"></i> </a> </li>
                                    <li> <a href="shop_list.html"> <i class="fa fa-th-list"></i> </a> </li>
                                </ul>
                            </div>
                            <div class="sorter">
                                <div class="short-by">
                                    <label>Sort By:</label>
                                    <select>
                                        <option selected="selected">Position</option>
                                        <option>Name</option>
                                        <option>Price</option>
                                        <option>Size</option>
                                    </select>
                                </div>
                                <div class="short-by page">
                                    <label>Show:</label>
                                    <select>
                                        <option selected="selected">18</option>
                                        <option>20</option>
                                        <option>25</option>
                                        <option>30</option>
                                    </select>
                                </div>
                            </div>
                        </div>--}}
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
                                                        <a type="button" class="add-to-cart-mt"
                                                           href="{{route('site.addToCartByButton',[$product->id])}}"><i
                                                                    class="fa fa-shopping-cart"></i><span> @lang('front-end.product.add_to_cart')</span>
                                                        </a>
                                                    </div>
                                                    {{--<div class="pr-info-area">
                                                        <div class="pr-button">
                                                            <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                                            <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                                            <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                                                        </div>
                                                    </div>--}}
                                                </div>
                                                <div class="item-info">
                                                    <div class="info-inner">
                                                        <div class="item-title"><a title="{{$product->title}}"
                                                                                   href="{{route('site.showProductDetails',[$product->code_url,$product->title_url])}}">{{$product->title}}</a>
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
                                                                        <p class="old-price"><span class="price-label">Regular Price:</span>
                                                                            <span class="price"> {{number_format($product->price)}} </span>
                                                                        </p>
                                                                    @else
                                                                        <span class="regular-price"> <span
                                                                                    class="price"> {{number_format($product->price)}} </span> </span>
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
                        <div class="pagination-area ">
                            <ul>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                    <div class="block shop-by-side">
                        @if($filter_id)

                            <div class="sidebar-bar-title">
                                <h3>انتخاب شما</h3>
                                <div style="width:95%;margin:auto" id="filter_name_box">

                                    @foreach($filter_id as $key=>$value)

                                        @if(!empty($value['name']))
											<?php
											$filter_box_id[$value['parent_id']] = 1;
											?>
                                            <div class="search_item" id="filter_items_<?= $key ?>"
                                                 onclick="remove_filter('<?= $key ?>')">
                                                <span>{{ $value['name'] }}</span>
                                                <span class="fa fa-remove"></span>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                        @endif
                        <div class="block-content">

                            @foreach($filter as $key=>$value)

                                @php
                                    $child_item=$value->get_child;
                                    $item_size=sizeof($child_item);
                                @endphp
                                @if($value->filed==1)
                                    <div class="layered-Category">
                                        <h2 class="saider-bar-title">{{ $value->name }}</h2>
                                        <div class="layered-content">
                                            <ul class="check-box-list">
                                                @foreach($child_item as $key2=>$value2)
													<?php
													$name = $value2->name;
													$class_name = 'filter_checkbox';
													?>
                                                    <li onclick="set_filter('<?= $value->id ?>','<?= $value2->id ?>','<?= $name ?>')">
                                                        <input id="filter_checkbox_<?= $value2->id ?>" type="checkbox"
                                                               value="{{ $value->ename }}_{{ $value2->id }}">
                                                        <label for="jtv1"> <span class="button"></span>
                                                            {{--<span id="filter_li_<?= $value2->id ?>"
                                                                  class="{{ $class_name }}"></span>--}}
                                                            <span class="test">{{ $value2->name }}</span>
                                                        </label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @else
                                    <div class="color-area">
                                        <h2 class="saider-bar-title">{{ $value->name }}</h2>
                                        <div class="color">
                                            <ul>
                                                @foreach($child_item as $key2=>$value2)
													<?php
													$color = explode('@', $value2->name);
													if (sizeof($color) == 2)
													{
														$name = $color[0];
													}
													?>
                                                    <li>
                                                        <input id="filter_checkbox_<?= $value2->id ?>" type="checkbox"
                                                               {{--@if(array_key_exists($value2->id,$filter_id)) checked="checked"  @endif--}} class="search_checkbox"
                                                               value="{{ $value->ename }}_{{ $value2->id }}">
														<?php
														$color = explode('@', $value2->name);

														?>
                                                        @if(sizeof($color)==2)

                                                            <label class="color_search" data-toggle="tooltip"
                                                                   title="{{ $color[0] }}"
                                                                   style="background:#{{ $color[1] }};@if($key2!=0) margin-right:10px @endif"></label>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                    <div class="block product-price-range ">
                        <div class="sidebar-bar-title">
                            <h3>Price</h3>
                        </div>
                        <div class="block-content">
                            <div class="slider-range">
                                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$"
                                     class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                                <div class="amount-range-price">Range: $10 - $550</div>
                                <ul class="check-box-list">
                                    <li>
                                        <input type="checkbox" id="p1" name="cc"/>
                                        <label for="p1"> <span class="button"></span> $20 - $50<span
                                                    class="count">(0)</span> </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p2" name="cc"/>
                                        <label for="p2"> <span class="button"></span> $50 - $100<span
                                                    class="count">(0)</span> </label>
                                    </li>
                                    <li>
                                        <input type="checkbox" id="p3" name="cc"/>
                                        <label for="p3"> <span class="button"></span> $100 - $250<span
                                                    class="count">(0)</span> </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="block sidebar-cart">
                        <div class="sidebar-bar-title">
                            <h3>My Cart</h3>
                        </div>
                        <div class="block-content">
                            <p class="amount">There are <a href="shopping_cart.html">2 items</a> in your cart.</p>
                            <ul>
                                <li class="item"><a href="shopping_cart.html" title="Sample Product"
                                                    class="product-image"><img src="images/products/img07.jpg"
                                                                               alt="Sample Product "></a>
                                    <div class="product-details">
                                        <div class="access"><a href="#" title="Remove This Item" class="remove-cart"><i
                                                        class="icon-close"></i></a></div>
                                        <p class="product-name"><a href="shopping_cart.html">Lorem ipsum dolor sit amet
                                                Consectetur</a></p>
                                        <strong>1</strong> x <span class="price">$19.99</span></div>
                                </li>
                                <li class="item last"><a href="#" title="Sample Product" class="product-image"><img
                                                src="images/products/img08.jpg" alt="Sample Product"></a>
                                    <div class="product-details">
                                        <div class="access"><a href="#" title="Remove This Item" class="remove-cart"><i
                                                        class="icon-close"></i></a></div>
                                        <p class="product-name"><a href="shopping_cart.html">Consectetur utes anet
                                                adipisicing elit</a></p>
                                        <strong>1</strong> x <span class="price">$8.00</span>
                                        <!--access clearfix-->
                                    </div>
                                </li>
                            </ul>
                            <div class="summary">
                                <p class="subtotal"><span class="label">Cart Subtotal:</span> <span
                                            class="price">$27.99</span></p>
                            </div>
                            <div class="cart-checkout">
                                <button class="button button-checkout" title="Submit" type="submit"><i
                                            class="fa fa-check"></i> <span>Checkout</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="block compare">
                        <div class="sidebar-bar-title">
                            <h3>Compare Products (2)</h3>
                        </div>
                        <div class="block-content">
                            <ol id="compare-items">
                                <li class="item"><a href="compare.html" title="Remove This Item" class="remove-cart"><i
                                                class="icon-close"></i></a> <a href="#" class="product-name"><i
                                                class="fa fa-angle-right"></i>&nbsp; Vestibulum porta tristique
                                        porttitor.</a></li>
                                <li class="item"><a href="compare.html" title="Remove This Item" class="remove-cart"><i
                                                class="icon-close"></i></a> <a href="#" class="product-name"><i
                                                class="fa fa-angle-right"></i>&nbsp; Lorem ipsum dolor sit amet</a></li>
                            </ol>
                            <div class="ajax-checkout">
                                <button type="submit" title="Submit" class="button button-compare"><span><i
                                                class="fa fa-signal"></i> Compare</span></button>
                                <button type="submit" title="Submit" class="button button-clear"><span><i
                                                class="fa fa-eraser"></i> Clear All</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="single-img-add sidebar-add-slider ">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div class="item active"><img src="images/add-slide1.jpg" alt="slide1">
                                    <div class="carousel-caption">
                                        <h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a>
                                        </h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="#" class="info">shopping Now</a></div>
                                </div>
                                <div class="item"><img src="images/add-slide2.jpg" alt="slide2">
                                    <div class="carousel-caption">
                                        <h3><a href="single_product.html" title=" Sample Product">Smartwatch
                                                Collection</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="#" class="info">All Collection</a></div>
                                </div>
                                <div class="item"><img src="images/add-slide3.jpg" alt="slide3">
                                    <div class="carousel-caption">
                                        <h3><a href="single_product.html" title=" Sample Product">Summer Sale</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button"
                               data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"
                                                        aria-hidden="true"></span> <span class="sr-only">Previous</span>
                            </a> <a class="right carousel-control" href="#carousel-example-generic" role="button"
                                    data-slide="next"> <span class="glyphicon glyphicon-chevron-right"
                                                             aria-hidden="true"></span> <span
                                        class="sr-only">Next</span> </a></div>
                    </div>
                    <div class="block special-product">
                        <div class="sidebar-bar-title">
                            <h3>Special Products</h3>
                        </div>
                        <div class="block-content">
                            <ul>
                                <li class="item">
                                    <div class="products-block-left"><a href="single_product.html"
                                                                        title="Sample Product"
                                                                        class="product-image"><img
                                                    src="images/products/img01.jpg" alt="Sample Product "></a></div>
                                    <div class="products-block-right">
                                        <p class="product-name"><a href="single_product.html">Lorem ipsum dolor sit amet
                                                Consectetur</a></p>
                                        <span class="price">$19.99</span>
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-o"></i></div>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="products-block-left"><a href="single_product.html"
                                                                        title="Sample Product"
                                                                        class="product-image"><img
                                                    src="images/products/img02.jpg" alt="Sample Product "></a></div>
                                    <div class="products-block-right">
                                        <p class="product-name"><a href="single_product.html">Consectetur utes anet
                                                adipisicing elit</a></p>
                                        <span class="price">$89.99</span>
                                        <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i
                                                    class="fa fa-star-o"></i></div>
                                    </div>
                                </li>
                            </ul>
                            <a class="link-all" href="shop_grid.html">All Products</a></div>
                    </div>
                    <div class="block popular-tags-area ">
                        <div class="sidebar-bar-title">
                            <h3>Popular Tags</h3>
                        </div>
                        <div class="tag">
                            <ul>
                                <li><a href="#">Boys</a></li>
                                <li><a href="#">Camera</a></li>
                                <li><a href="#">good</a></li>
                                <li><a href="#">Computers</a></li>
                                <li><a href="#">Phone</a></li>
                                <li><a href="#">clothes</a></li>
                                <li><a href="#">girl</a></li>
                                <li><a href="#">shoes</a></li>
                                <li><a href="#">women</a></li>
                                <li><a href="#">accessoties</a></li>
                                <li><a href="#">View All Tags</a></li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@section('bottom_script')

    <script type="text/javascript" src="{{ url('js/list.min.js') }}"></script>
    <script src="{{ url('js/ion.rangeSlider.min.js') }}"></script>
    <script>
			<?php
			$url = url('ajax/set_filter_product');
			?>
        var number_compare = 0;
        var product_status = 0;
        var compare_product_list = '';
        var product_type = 1;
        var search_text = '';
        var first_price = 0;
        var last_price = 0;
        var $range = $("#example_id");

        $range.ionRangeSlider({
            type: "double",
            min:<?= $price['price1'] ?>,
            max:<?= $price['price2'] ?>,
            from:<?= $price['price1'] ?>,
            to:<?= $price['price2'] ?>,
            step: 100,
            onFinish: function (data) {
                var a = data.from;
                var b = data.to;
                first_price = a;
                last_price = b;
            }
        });


        set_filter = function (id1, id2, name) {
            var c = document.getElementById('filter_li_' + id2);
            var c2 = document.getElementById('filter_checkbox_' + id2);
            if (c) {
                if (c.className == 'filter_checkbox') {
                    c.className = 'filter_checkbox2';
                } else if (c.className == 'filter_checkbox2') {
                    c.className = 'filter_checkbox';
                }
            }
            if (c2) {
                if (c2.checked) {
                    c2.checked = false;
                    $("#filter_items_" + id2).remove();
                } else {
                    c2.checked = true;
                    var id = 'filter_items_' + id2;
                    var html = '<div class="search_item"  onclick="remove_filter(' + id2 + ')" id=' + id + '>' +
                        '<span>' + name + '</span>' +
                        '<span class="fa fa-remove"></span></div>';
                    $("#filter_name_box").append(html);
                }

            }

            send_data('<?= $url ?>');

        };
        remove_filter = function (id) {
            $("#filter_items_" + id).remove();
            var c = document.getElementById('filter_li_' + id);
            var c2 = document.getElementById('filter_checkbox_' + id);
            if (c2) {
                c2.checked = false;
            }
            if (c) {
                c.className = 'filter_checkbox';
            }
            send_data('<?= $url ?>');
        };

        set_status_product = function () {
            var c = document.getElementById('status_product');
            if (c) {
                if (c.checked) {
                    product_status = 0;
                    c.checked = false;
                    $("#status_prodict_ic").removeClass('filter_checkbox2');
                    $("#status_prodict_ic").addClass('filter_checkbox');
                } else {
                    product_status = 1;
                    c.checked = true;
                    $("#status_prodict_ic").removeClass('filter_checkbox');
                    $("#status_prodict_ic").addClass('filter_checkbox2');
                }
            }
            send_data('<?= $url ?>');
        };
        send_data = function (url) {
            var cat_id = '<?= $category2->id ?>';
            var array = new Array;
            var checkbox_list = document.getElementsByClassName('search_checkbox');
            var j = 0;
            var cat_url = '<?= $cat_url ?>';
            for (var i = 0; i < checkbox_list.length; i++) {
                if (checkbox_list[i].checked) {
                    array[j] = checkbox_list[i].value;
                    j++;
                }
            }
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: url,
                type: "POST",
                data: 'filter_product=' + array + '&cat_url=' + cat_url + '&product_status=' + product_status + '&type=' + product_type + '&search_text=' + search_text + '&first_price=' + first_price + '&last_price=' + last_price + '&cat_id=' + cat_id,
                success: function (data) {
                    console.log(data);
                    $("#show_product").html(data);
                },
                error: function (data) {

                    // Log in the console
                    var errors = data.responseJSON;
                    console.log(errors);

                    // or, what you are trying to achieve
                    // render the response via js, pushing the error in your
                    // blade page

                    var errors = response.responseJSON;
                    errorsHtml = '<div class="alert alert-danger"><ul>';
                    $.each(errors.errors, function (k, v) {
                        errorsHtml += '<li>' + v + '</li>';
                    });
                    errorsHtml += '</ul></di>';

                    $('#error_message').html(errorsHtml);

                    //appending to a <div id="error_message"></div> inside your form
                }
            });
        };
        var options = {
            valueNames: ['test']
        };
        $('.pagination a').click(function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var url = url.split('page=');
            if (url.length == 2) {
                var ajax_url = '<?= $url ?>?page=' + url[1];
                send_data(ajax_url);
            }
        });
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
        show_list = function (id) {
            var c = document.getElementById('filter_search_item_' + id);
            if (c) {
                if (c.style.display == 'block') {
                    $("#angle-down_" + id).addClass('fa-angle-down');
                    $("#angle-down_" + id).removeClass('fa-angle-up');
                    $("#filter_search_item_" + id).hide();
                } else {
                    $("#angle-down_" + id).addClass('fa-angle-up');
                    $("#angle-down_" + id).removeClass('fa-angle-down');

                    $("#filter_search_item_" + id).show();
                }
            }
        };
		<?php
		/*foreach ($id_list as $key=>$value)
        {
        */?><!--
        var userList_<?/*= $key */?> = new List('filters_<?/*= $value */?>', options);

		-->
		<?php
		/*		}*/
		?>
        $('.search_product_box').hover(function () {

                $('.product_item_compare', this).show();
            },
            function () {
                $('.product_item_compare', this).hide();
            });
        add_compare_product = function (id, title, img) {
            var c = document.getElementById('compare_' + id).className;
            if (c == 'checkbox2') {
                if (number_compare < 4) {
                    compare_product_list = compare_product_list + '/DKP-' + id;
                    number_compare = number_compare + 1;
                    document.getElementById('compare_' + id).className = 'active_checkbox2';

                    var span = 'مقایسه (' + number_compare + ' ) مورد';
                    $("#compare_product_link").html(span);
                    $("#compare_product_link").attr('href', '{{ url('Compare') }}' + compare_product_list);

                    $("#compare__toggle-handler").show();
                    $("#number_compare").text(number_compare);
                    var product_title = title.substr(0, 33);
                    if (title.length > 33) {
                        product_title = product_title + ' ...';
                    }
                    var src = '{{ url('upload').'/' }}' + img;
                    var html = '<div id="product_' + id + '" class="compare_product_box">' +
                        '<div class="compare_img_box">' +
                        '<span class="fa fa-remove" onclick="del_compare(' + id + ')"></span>' +
                        '<img src="' + src + '" class="compare_product_img">' +
                        '</div>' +
                        '<p style="font-size:13px;padding-top:7px;text-align:center">' + product_title + '</p>' +
                        '</div>';

                    $("#compare_right_box").append(html);
                } else {
                    alert('حداکثر 4 محصول را میتوانید به لیست مقایسه اضافه کنید');
                }


            } else if (c == 'active_checkbox2') {
                document.getElementById('compare_' + id).className = 'checkbox2';
                number_compare = number_compare - 1;
                if (number_compare > 0) {
                    $("#compare__toggle-handler").show();
                    $("#number_compare").text(number_compare);
                } else {
                    $("#compare__toggle-handler").hide();
                }
                $("#product_" + id).remove();

            }

        };
        show_compare_box = function () {
            var h = document.getElementById('compare').style.height;
            if (h == 'auto') {
                document.getElementById('compare').style.height = '0px';
            } else {
                document.getElementById('compare').style.height = 'auto';
            }

        };
        del_compare_product = function () {
            var c = compare_product_list;
            var b = c.split('/');
            for (var i = 0; i < b.length; i++) {
                if (b[i].trim() != '') {
                    var a = b[i].split('-');
                    if (a.length == 2) {
                        if (a[0] == 'DKP') {
                            $("#product_" + a[1]).remove();
                            var t = document.getElementById('compare_' + a[1]);
                            if (t) {
                                t.className = 'checkbox2';
                            }
                        }
                    }
                }

            }
            $("#compare__toggle-handler").hide();
            number_compare = 0;
            compare_product_list = '';
            document.getElementById('compare').style.height = '0px';
        };
        del_compare = function (id) {
            $("#product_" + id).hide();
            if (number_compare > 0) {
                number_compare = number_compare - 1;
            }
            var s = '/DKP-' + id;
            compare_product_list = compare_product_list.replace(s, '');

            var span = 'مقایسه (' + number_compare + ' ) مورد';
            $("#compare_product_link").html(span);
            $("#compare_product_link").attr('href', '{{ url('Compare') }}' + compare_product_list);
            if (number_compare == 0) {
                document.getElementById('compare').style.height = '0px';
                $("#compare__toggle-handler").hide();
            }
        };
        set_type = function (type) {
            product_type = type;
            $('.search_type_ul li').removeClass('active');
            $("#search_type_" + type).addClass('active');
            send_data('<?= $url ?>');
        };
        search_product = function () {
            var text = document.getElementById('search_input').value;
            if (text.trim() != '') {
                search_text = text;
                send_data('<?= $url ?>');
            }
        };
        set_price_search = function () {
            send_data('<?= $url ?>');
        }
    </script>

@endsection