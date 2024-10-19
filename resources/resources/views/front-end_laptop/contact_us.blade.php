@extends('layouts.front-end')

@section('content')

    <!-- Breadcrumbs -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li class="home"><a title="Go to Home Page" href="/">خانه</a><span>&raquo;</span></li>

                        <li><strong>تماس با ما</strong></li>
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

                    <div id="contact" class="page-content page-contact">
                        <div class="page-title">
                            <h2>تماس با ما</h2>
                        </div>
                        <div id="message-box-conact">ما برای کارهای جدید آماده ایم!</div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6" id="contact_form_map">
                                <h3 class="page-subheading">با ما در ارتباط باشید</h3>
                                {{--<p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum
                                    magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt
                                    aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                                <br/>
                                <ul>
                                    <li>Praesent nec tincidunt turpis.</li>
                                    <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                                    <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                                </ul>
                                <br/>--}}
                                <ul class="store_info">
                                    <li><i class="fa fa-home"></i>تهران، خیابان انقلاب، تقاطع خیابان دانشگاه و لبافی نژاد</li>
                                    <li><i class="fa fa-phone"></i><span>021-66477790-1</span></li>
                                    <li><i class="fa fa-fax"></i><span>021-66477791</span></li>
                                    <li><i class="fa fa-envelope"></i>Email: <span><a
                                                    href="mailto:support@tajhizland.com">support@tajhizland.com</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <h3 class="page-subheading">پیام تان را برایمان ارسال کنید</h3>
                                <form action="{{route('site.sendContact')}}" method="post">

                                    {{csrf_field()}}

                                    <div class="contact-form-box">
                                        <div class="form-selector">
                                            <label>نام و نام خانوادگی</label>
                                            <input type="text" class="form-control input-sm" id="name" name="name"/>
                                        </div>
                                        <div class="form-selector">
                                            <label>پست الکترونیک</label>
                                            <input type="text" class="form-control input-sm" id="email" name="email"/>
                                        </div>
                                        <div class="form-selector">
                                            <label>موبایل</label>
                                            <input type="text" class="form-control input-sm" id="phone" name="phone"/>
                                        </div>
                                        <div class="form-selector">
                                            <label>متن پیام</label>
                                            <textarea class="form-control input-sm" rows="10" cols="5" id="message" name="message"></textarea>
                                        </div>
                                        <div class="form-selector">
                                            <button class="button"><i class="fa fa-send"></i>&nbsp;
                                                <span>ارسال</span></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <!-- Main Container End -->
    <!-- Footer -->

@endsection