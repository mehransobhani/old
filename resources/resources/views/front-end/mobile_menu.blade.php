<div id="mobile-menu">
    <ul>
        <li><a href="/" class="home1">خانه</a></li>
        <li><a href="#">محصولات</a>
            <ul>
                @foreach($categories as $category)

                    @if(!in_array($category->id,array(31,56,57,58)))


                        <li>
                            <a href="{{count($category->getProductCount)? route('site.categoryLevelOne',[$category->cat_ename]):'#'}}"> {{$category->cat_name}} </a>
                            @if($category->getChild()->exists())
                                @if($category->id!=30)
                                    <ul>

                                        @foreach($category->getChild as $childCategory)
                                            @if(count($childCategory->getProductCount)>0)
                                                <li>
                                                    <a href="{{ route('site.categoryLevelTwo',[$category->cat_ename,$childCategory->cat_ename])}}"><span>{{$childCategory->cat_name}}</span></a>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                @else
                                    <ul>

                                        @foreach($category->getChild as $categoryLevelTwo)
                                           {{-- <li>
                                                <a href="#">{{$categoryLevelTwo->cat_name}}</a>
                                                <ul>--}}
                                                    @foreach($categoryLevelTwo->getChild as $childCategory)
                                                        @if(count($childCategory->getProductCount)>0)

                                                            <li>
                                                                <a href="{{ route('site.categoryLevelThree',[$category->cat_ename,$categoryLevelTwo->cat_ename,$childCategory->cat_ename])}}"><span>{{$childCategory->cat_name}}</span></a>
                                                            </li>

                                                        @endif
                                                    @endforeach
                                            {{--</ul>
                                        </li>--}}
                                        @endforeach
                                    </ul>
                                @endif
                            @endif
                        </li>


                    @endif
                @endforeach
            </ul>
        </li>
        <li><a href="{{route('site.listNews')}}">اخبار و مقالات</a></li>
        <li><a href="{{route('site.showPage',['projects'])}}">مشاوره و تجهیز</a></li>
        <li><a href="{{route('site.showPage',['works'])}}">تولید یخچال فروشگاهی</a></li>
        <li><a href="{{route('site.showPage',['about'])}}">درباره ما</a></li>
        <li><a href="/contact_us">تماس با ما</a></li>
    </ul>
</div>