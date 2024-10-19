<div class="mm-toggle-wrap">
    <div class="mm-toggle"><i class="fa fa-align-justify"></i></div>
    <span class="mm-label">دسته ها</span></div>
<div class="mega-container visible-lg visible-md visible-sm">
    <div class="navleft-container">
        <div class="mega-menu-title">
            <h3>دسته ها</h3>
        </div>
        <div class="mega-menu-category"
             @if(\Route::current()->getName() != 'site.homepage') style="display: none" @endif>
            <ul class="nav">

                @foreach($categories as $category)
                    @if(!in_array($category->id,array(31,56,57,58)))
                        <li @if(!$category->getChild()->exists()) class="nosub" @endif><a
                                    href="{{count($category->getProductCount)? route('site.categoryLevelOne',[$category->cat_ename]):'#'}}"> {{$category->cat_name}}</a>

                            @if($category->id==30)

                                <div class="wrap-popup">
                                    <div class="popup">

                                        <div class="row">

                                            @foreach($category->getChild as $categoryLevelTwo)

                                                <div class="col-md-4 col-sm-6">
                                                    <h3>{{$categoryLevelTwo->cat_name}}</h3>
                                                    <ul class="nav">
                                                        @foreach($categoryLevelTwo->getChild as $childCategory)

                                                            @if(count($childCategory->getProductCount)>0)

                                                                <li>
                                                                    <a href="{{ route('site.categoryLevelThree',[$category->cat_ename,$categoryLevelTwo->cat_ename,$childCategory->cat_ename])}}"><span>{{$childCategory->cat_name}}</span></a>
                                                                </li>

                                                            @endif

                                                        @endforeach
                                                    </ul>
                                                </div>

                                            @endforeach

                                            <div class="col-sm-12">
                                                <a class="ads1" href="#">
                                                    <img class="img-responsive"
                                                         src="{{asset('upload/'.$category->img)}}" alt="">
                                                </a>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            @else

                                @if($category->getChild()->exists())

                                    <div class="wrap-popup">
                                        <div class="popup">
                                            <div class="row">
												<?php $index = 0; ?>
                                                @foreach($category->getChild as $childCategory)
                                                    @if(count($childCategory->getProductCount)>0)
														<?php $index++; ?>

                                                        @if($index<=11)

                                                            @if($loop->first)

                                                                <div class="col-md-4 col-sm-6">
                                                                    <ul class="nav">

                                                                        @endif

                                                                        <li>
                                                                            <a href="{{ route('site.categoryLevelTwo',[$category->cat_ename,$childCategory->cat_ename])}}"><span>{{$childCategory->cat_name}}</span></a>
                                                                        </li>


                                                                        @if($index==11)

                                                                    </ul>
                                                                </div>

                                                            @endif

                                                        @else

                                                            @if($index==12)

                                                                <div class="col-md-4 col-sm-6">
                                                                    <ul class="nav">

                                                                        @endif

                                                                        <li>
                                                                            <a href="{{ route('site.categoryLevelTwo',[$category->cat_ename,$childCategory->cat_ename])}}"><span>{{$childCategory->cat_name}}</span></a>
                                                                        </li>

                                                                        @endif
                                                                        @endif


                                                                        @if($loop->last)

                                                                    </ul>
                                                                </div>

                                                            @endif

                                                            @endforeach
                                                            <div class="col-md-4 has-sep hidden-sm">
                                                                <div class="custom-menu-right">
                                                                    <div class="box-banner menu-banner">
                                                                        <div class="add-right"><a href="#"><img
                                                                                        src="{{asset('upload/'.$category->img)}}"
                                                                                        alt="html template"></a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>


