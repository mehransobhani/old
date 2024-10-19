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

                            <li><strong>{{$news->title}}</strong></li>
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
                                <h2>{{$news->title}}</h2>
                            </div>


                            <div>{!! $news->content !!}</div>


                        </div>

                    </section>
                </div>
            </div>
        </section>
        <!-- Main Container End -->
    </div>
@endsection