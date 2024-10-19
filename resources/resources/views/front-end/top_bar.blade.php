<div class="container">
    <div class="row">
        <div class="col-lg-4 col-sm-4 hidden-xs">
            <!-- Default Welcome Message -->
            <div class="welcome-msg ">به تجهیز لند خوش آمدید</div>
            <span class="phone hidden-sm">
                <span> تلفن تماس : </span>
                <span class="persian">1-02166477790</span>
            </span>
        </div>

        <!-- top links -->
        <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
            <div class="links">
                @guest
                    <div class="login"><a href="{{route('login')}}"><i class="fa fa-unlock-alt"></i><span
                                    class="hidden-xs">ورود</span></a></div>

                @else
                    {{--<div class="wishlist"><a title="My Wishlist" href="wishlist.html"><i
                                    class="fa fa-heart"></i><span class="hidden-xs">Wishlist</span></a>
                    </div>
                    <div class="blog"><a title="Blog" href="blog.html"><i class="fa fa-rss"></i><span
                                    class="hidden-xs">Blog</span></a></div>--}}
                    @if(auth()->user()->role=='admin')
                        <div class="myaccount"><a title="مدیریت" href="/admin"><i
                                        class="fa fa-user"></i><span class="hidden-xs">مدیریت</span></a>
                        </div>
                    @endif
                    <div class="myaccount"><a title="پروفایل" href="{{route('site.userProfile')}}"><i
                                    class="fa fa-user"></i><span class="hidden-xs">پروفایل</span></a>
                    </div>
                    <div class="wishlist"><a title="علاقه مندی" href="{{route('site.showWishLists')}}"><i
                                    class="fa fa-heart"></i><span class="hidden-xs">علاقه مندی</span></a>
                    </div>
                    <div class="blog">
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fa fa-sign-out"></i>
                            <span class="hidden-xs">خروج</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                @endguest
            </div>
            {{--<div class="language-currency-wrapper">
                <div class="inner-cl">
                    <div class="block block-language form-language">
                        <div class="lg-cur"><span> <img src="images/front-end/flag-default.jpg"
                                                        alt="French"> <span class="lg-fr">French</span> <i
                                        class="fa fa-angle-down"></i> </span></div>
                        <ul>
                            <li><a class="selected" href="#"> <img
                                            src="images/front-end/flag-english.jpg" alt="flag"> <span>English</span>
                                </a></li>
                            <li><a href="#"> <img src="images/front-end/flag-default.jpg" alt="flag">
                                    <span>French</span> </a></li>
                            <li><a href="#"> <img src="images/front-end/flag-german.jpg" alt="flag">
                                    <span>German</span> </a></li>
                            <li><a href="#"> <img src="images/front-end/flag-brazil.jpg" alt="flag">
                                    <span>Brazil</span> </a></li>
                            <li><a href="#"> <img src="images/front-end/flag-chile.jpg" alt="flag">
                                    <span>Chile</span> </a></li>
                            <li><a href="#"> <img src="images/front-end/flag-spain.jpg" alt="flag">
                                    <span>Spain</span> </a></li>
                        </ul>
                    </div>
                    <div class="block block-currency">
                        <div class="item-cur"><span>USD </span> <i class="fa fa-angle-down"></i></div>
                        <ul>
                            <li><a href="#"><span class="cur_icon">€</span> EUR</a></li>
                            <li><a href="#"><span class="cur_icon">¥</span> JPY</a></li>
                            <li><a class="selected" href="#"><span class="cur_icon">$</span> USD</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- End Default Welcome Message -->
            </div>--}}
        </div>
    </div>
</div>