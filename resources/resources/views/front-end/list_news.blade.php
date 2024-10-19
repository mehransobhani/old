@extends('layouts.front-end')

@section('top_style')

    <link rel="stylesheet" type="text/css" href="{{asset('css/front-end/blog.css')}}" media="all">

@endsection

@section('content')

    <section class="blog_post">
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- Center colunm-->
                <div class="center_column col-xs-12 col-sm-12" id="center_column">
                    <div class="page-title">
                        <h2>اخبار و مقالات</h2>
                    </div>
                    <ul class="blog-posts">

						<?php
						$jdf = new \App\lib\Jdf();

						?>

                        @foreach($news as $key=>$value)


                            <li class="post-item wow fadeInUp">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="entry-thumb image-hover2"><a
                                                        href="{{route('site.viewNews',[$value->url])}}">
                                                    <figure><img src="{{asset('upload/'.$value->img)}}" alt="Blog">
                                                    </figure>
                                                </a></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <h3 class="entry-title">
                                                <a href="{{route('site.viewNews',[$value->url])}}">
                                                    {{$value->title}}
                                                </a>
                                            </h3>
                                            <div class="entry-meta-data"><span class="author"> <i
                                                            class="fa fa-user"></i>&nbsp; نوشته شده: <a
                                                            href="#">مدیر سایت</a></span> <span class="cat"> <i
                                                            class="fa fa-folder"></i>&nbsp; <a href="#">اخبار و مقالات </a> </span> <span
                                                        class="date"><i
                                                            class="fa fa-calendar"></i>&nbsp; {{ $jdf->jdate('d F Y',strtotime($value->created_at)) }}</span>
                                            </div>
                                            <div class="entry-excerpt">{!!  str_limit(strip_tags($value->content),300,'...') !!}</div>
                                            <div class="entry-more"><a href="{{route('site.viewNews',[$value->url])}}"
                                                                       class="button"> ادامه مطلب &nbsp;
                                                    <i
                                                            class="fa fa-angle-double-left"></i></a></div>
                                        </div>
                                    </div>
                                </article>
                            </li>

                        @endforeach

                    </ul>
                    <div class="sortPagiBar">
                        <div class="pagination-area " style="visibility: visible;">
                            {{--<ul>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>--}}

                            {{$news->links()}}
                        </div>
                    </div>
                </div>
                <!-- ./ Center colunm -->
            </div>
            <!-- ./row-->
        </div>
    </section>


@endsection