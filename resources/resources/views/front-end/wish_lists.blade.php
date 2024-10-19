@extends('layouts.front-end')

@section('content')
    <div class="main-container col1-layout">
        <!-- Breadcrumbs -->

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="Go to Home Page" href="/">خانه</a><span>&raquo;</span>
                            </li>

                            <li><strong>لیست علاقه مندی ها</strong></li>
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
                                <h2>لیست علاقه مندی ها</h2>
                            </div>

                            @if(count($wishLists)>0)

                                <div class="wishlist-item table-responsive">

                                    <table class="col-md-12">
                                        <thead>
                                        <tr>
                                            <th class="th-delate">حذف</th>
                                            <th class="th-product">تصویر</th>
                                            <th class="th-details">عنوان محصول</th>
                                            <th class="th-price">قیمت واحد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($wishLists as $wish_list)


                                            <tr>
                                                <td class="th-delate"><a
                                                            href="{{route('site.removeFromWishList',[$wish_list->id])}}">X</a>
                                                </td>
                                                <td class="th-product"><a href="#"><img
                                                                src="upload/{{$wish_list->productInfo->get_img->url}}"
                                                                alt="cart"></a></td>
                                                <td class="th-details"><h2><a
                                                                href="{{route('site.showProductDetails',[$wish_list->productInfo->code_url,$wish_list->productInfo->title_url])}}">{{$wish_list->productInfo->title}}</a>
                                                    </h2></td>
                                                <td class="th-price">{{number_format($wish_list->productInfo->price)}}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>


                                </div>

                            @else

                                <span>هیچ محصولی در لیست علاقه مندی های شما وجود ندراد!</span>

                            @endif

                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- Main Container End -->
    </div>
@endsection