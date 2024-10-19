<footer>
    <div class="footer-newsletter">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7">
                    {{--<form id="newsletter-validate-detail" method="post" action="#">--}}
                    <h3 class="hidden-sm">عضویت در خبرنامه</h3>
                    <div class="newsletter-inner">
                        <input class="newsletter-email" name='Email' placeholder='آدرس ایمیل'/>
                        <button class="button subscribe" type="submit" title="Subscribe">عضویت</button>
                    </div>
                    {{--</form>--}}
                </div>
                <div class="social col-md-4 col-sm-5">
                    <ul class="inline-mode">
                        <li class="social-network fb"><a title="Connect us on Facebook" target="_blank"
                                                         href="https://www.facebook.com"><i
                                        class="fa fa-facebook"></i></a></li>
                        <li class="social-network googleplus"><a title="Connect us on Google+" target="_blank"
                                                                 href="https://plus.google.com"><i
                                        class="fa fa-google-plus"></i></a></li>
                        <li class="social-network tw"><a title="Connect us on Twitter" target="_blank"
                                                         href="https://twitter.com/"><i
                                        class="fa fa-twitter"></i></a></li>
                        <li class="social-network linkedin"><a title="Connect us on Linkedin" target="_blank"
                                                               href="https://www.pinterest.com/"><i
                                        class="fa fa-linkedin"></i></a></li>
                        <li class="social-network rss"><a title="Connect us on Instagram" target="_blank"
                                                          href="https://instagram.com/"><i
                                        class="fa fa-rss"></i></a></li>
                        <li class="social-network instagram"><a title="Connect us on Instagram" target="_blank"
                                                                href="https://www.instagram.com/tajhizland_com"><i
                                        class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
                <div class="footer-logo"><a href="/"><img src="{{asset('images/front-end/logos/bottom_logo.png')}}"
                                                          alt="fotter logo"></a></div>
                <p>تجهیز لند، فروشگاه اینترنتی تجهیزات آشپزخانه صنعتی،رستوران،فست فود،کافی شاپ و...</p>
                <div class="footer-content" style="display:flex;align-items: center;">
                    <!--                    <div class="email"><i class="fa fa-envelope"></i>
                                            <p>Support@tajhizland.com</p>
                                        </div>
                                        <div class="phone"><i class="fa fa-phone"></i>
                                            <p class="persian">02166477790-1</p>
                                        </div>
                                        <div class="address"><i class="fa fa-map-marker"></i>
                                            <p> تهران، خیابان انقلاب، تقاطع خیابان دانشگاه و لبافی نژاد</p>
                                        </div>-->


                    <a referrerpolicy="origin" target="_blank" 
                       href="https://trustseal.enamad.ir/?id=150491&amp;Code=dHACISLBlXNOcdnB2JpZ"><img
                                referrerpolicy="origin"
                                src="https://Trustseal.eNamad.ir/logo.aspx?id=150491&amp;Code=dHACISLBlXNOcdnB2JpZ"
                                alt="" style="cursor:pointer" id="dHACISLBlXNOcdnB2JpZ"></a>
                   <img referrerpolicy='origin' id = 'rgvjjxlzsizprgvjnbqejzpe' style = 'cursor:pointer' onclick = 'window.open("https://logo.samandehi.ir/Verify.aspx?id=319327&p=xlaorfthpfvlxlaouiwkjyoe", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")' alt = 'logo-samandehi' src = 'https://logo.samandehi.ir/logo.aspx?id=319327&p=qftinbpdbsiyqftiodrfyndt' />
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                <div class="footer-links">
                    <h3 class="links-title">اطلاعات<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
                    <div class="tabBlock" id="TabBlock-1">
                        <ul class="list-links list-unstyled">
                            <li><a href="{{route('site.showPage',['راهنمای-خرید-از-تجهیزلند'])}}">راهنمای خرید</a></li>
                            <li><a href="{{route('site.showPage',['نحوه-ثبت-سفارش'])}}">نحوه ثبت سفارش</a></li>
                            <li><a href="{{route('site.showPage',['رویه-ارسال-سفارش'])}}">رویه ارسال سفارش</a></li>
                            <li><a href="{{route('site.showPage',['شیوه-های-پرداخت'])}}">شیوه های پرداخت</a></li>
                            <li><a href="{{route('site.showPage',['قوانین-تجهیزلند'])}}">قوانین و مقررات</a></li>
                            <li><a href="{{route('site.showPage',['شرایط-بازگرداندن-کالا'])}}">شرایط بازگرداندن
                                    سفارش</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                <div class="footer-links">
                    <h3 class="links-title">خدمات تجهیزلند<a class="expander visible-xs" href="#TabBlock-3">+</a></h3>
                    <div class="tabBlock" id="TabBlock-3">
                        <ul class="list-links list-unstyled">
                            <li><a href="#s">فروشگاه اینترنتی</a></li>
                            <li><a href="{{route('site.showPage',['تجهیز-رستوران'])}}">تجهیز رستوران</a></li>
                            <li><a href="{{route('site.showPage',['تجهیز-کافی-شاپ'])}}">تجهیز کافی شاپ</a></li>
                            <li><a href="{{route('site.showPage',['تجهیز-فست-فود'])}}">تجهیز فست فود</a></li>
                            <li><a href="{{route('site.showPage',['تجهیز-آشپزخانه-صنعتی'])}}">تجهیز آشپزخانه صنعتی</a>
                            </li>
                            <li><a href="{{route('site.showPage',['تولید-انواع-یخچال-فروشگاهی'])}}">تولید انواع یخچال
                                    فروشگاهی</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
                <div class="footer-links">
                    <h3 class="links-title">دسترسی سریع<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
                    <div class="tabBlock" id="TabBlock-4">
                        <ul class="list-links list-unstyled">
                            <li><a href="{{route('site.showPage',['فروش-محصولات-در-تجهیزلند'])}}">فروش محصولات در
                                    تجهیزلند</a></li>
                            <li><a href="{{route('site.showPage',['خدمات-پس-از-فروش'])}}">خدمات پس از فروش</a></li>
                            <li><a href="{{route('site.showPage',['پرسش-های-متداول'])}}">پرسش های متداول</a></li>
                            <li><a href="{{route('site.listNews')}}">مقالات</a></li>
                            <li><a href="{{route('site.showPage',['about'])}}">درباره ما</a></li>
                            <li><a href="/contact_us">تماس با ما</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-coppyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 coppyright"> کپی رایت © 1398 <a href="/"> تجهیزلند </a>. کلیه حقوق مادی و
                    معنوی محفوظ می باشد.
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="payment">
                        <!--                        <ul>
                                                    <li><a href="#"><img title="Visa" alt="Visa" src="images/front-end/visa.png"></a></li>
                                                    <li><a href="#"><img title="Paypal" alt="Paypal" src="images/front-end/paypal.png"></a>
                                                    </li>
                                                    <li><a href="#"><img title="Discover" alt="Discover"
                                                                         src="images/front-end/discover.png"></a></li>
                                                    <li><a href="#"><img title="Master Card" alt="Master Card"
                                                                         src="images/front-end/master-card.png"></a></li>
                                                </ul>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>