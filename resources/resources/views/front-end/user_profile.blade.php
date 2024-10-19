@extends('layouts.front-end')

@section('content')
    <!-- Breadcrumbs -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"><a title="Go to Home Page" href="/">خانه</a><span>&raquo;</span>
                        </li>

                        <li><strong>پروفایل کاربری</strong></li>
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
                            <h2>پروفایل کاربری</h2>
                        </div>

                        @if(count($orders)>0)

                            <div class="wishlist-item table-responsive">

                                <table class="col-md-12">
                                    <thead>
                                    <tr>
                                        <th class="th-delate">شماره سفارش</th>
                                        <th class="th-product">زمان خرید</th>
                                        <th class="th-details">مبلغ سفارش</th>
                                        <th class="th-price">وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $Jdf=new \App\lib\Jdf(); ?>
                                    @foreach($orders as $order)


                                        <tr>
                                            <td class="th-delate"><a
                                                        href="{{route('site.showOrder',['id'=>$order->id])}}">{{$order->order_id}}</a>
                                            </td>

                                            <td class="th-product">{{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$order->time)) }} {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)) }}</td>

                                            <td class="th-details">{{ number_format($order->price) }} تومان</td>
                                            <td class="th-price">
                                                @if($order->pay_status==1)
                                                    <span>پرداخت شده</span>
                                                @else
                                                    <span style="color:red">در انتظار پرداخت</span>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>


                            </div>

                        @else

                            <span>هیچ سفارشی در پروفایل شما وجود ندراد!</span>

                        @endif

                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Main Container End -->
@endsection