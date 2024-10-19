<div id="mobile-menu">
    <ul>
        <li><a href="/" class="home1">خانه</a></li>
        <li><a href="#">محصولات</a>
            <ul>
                @foreach($categories as $category)

                    <li>
                        <a href="{{count($category->getProductCount)? route('site.categoryLevelOne',[$category->cat_ename]):'#'}}"> {{$category->cat_name}} </a>
                    </li>

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