<div class="container">
    <div id="latest-news" class="news">
        <div class="page-header">
            <h2>آخرین اخبار و مقالات</h2>
        </div>
        <div class="slider-items-products">
            <div id="latest-news-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">

				<?php
				$jdf = new \App\lib\Jdf();

				?>

                @foreach($news as $key=>$value)

                    <!-- Item -->
                        <div class="item">
                            <div class="jtv-blog">
                                <div class="blog-img"><a href="{{route('site.viewNews',[$value->url])}}"> <img
                                                class="primary-img"
                                                src="{{asset('upload/'.$value->img)}}"
                                                alt=""></a> <span
                                            class="moretag"></span></div>
                                <div class="blog-content-jtv">
                                    <h2><a href="{{route('site.viewNews',[$value->url])}}">{{$value->title}}</a></h2>
                                    <p>{!!  str_limit(strip_tags($value->content),100,'...') !!}</p>
                                    {{--<span class="blog-likes"><i class="fa fa-heart"></i> 149 likes</span> <span
                                            class="blog-comments"><i class="fa fa-comment"></i> 80 comments</span>--}}
                                    <div class="blog-action">
                                        <span>{{ $jdf->jdate('d F Y',strtotime($value->created_at)) }}</span>
                                        <a class="read-more"
                                           href="{{route('site.viewNews',[$value->url])}}">ادامه مطلب</a></div>
                                </div>
                            </div>
                        </div>
                        <!-- End Item -->

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>