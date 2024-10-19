@php

    $item_name=array();
    $item_name[1]='کيفيت ساخت';
    $item_name[2]='ارزش خريد به نسبت قيمت';
    $item_name[3]='نوآوري';
    $item_name[4]='امکانات و قابليت ها';
    $item_name[5]='سهولت استفاده';
    $item_name[6]='طراحي و ظاهر';

    function get_item_value($score,$n)
    {
        $a=3;
        if($score)
        {
          $e=explode('@#',$score->value);
          foreach ($e as $key=>$value)
          {
            $k=$n.'_';
            $c=explode($k,$value);
            if(is_array($c))
            {
               if(sizeof($c)==2)
               {
                  $a=$c[1];
               }
            }
          }
        }
        return $a;
    }

    function score_check($score, $n)
        {
            $a = 0;
            if ($score)
            {
                $e = explode('@#', $score->value);
                foreach ($e as $key => $value)
                {
                    $k = $n . '_';
                    $c = explode($k, $value);
                    if (is_array($c))
                    {
                        if (sizeof($c) == 2)
                        {
                            $a = $c[1];
                        }
                    }
                }
            }

            return $a;
        }
@endphp

@if(!$comment)

    <div class="row">
        <div class="col-sm-5 col-lg-5 col-md-5">
            <div class="reviews-content-left">
                <h2>امتیاز شما به این محصول</h2>

                <form action="{{ url('site/add_score') }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                    <div style="width:300px;margin-top: 20px;">
                        <p>کيفيت ساخت</p>
                        <input type="range" min="0" max="5" step="1" name="range[1]" data-rangeslider
                               value="<?= get_item_value($score, 1) ?>" id="range_1"/>
                        <p id="output_range_1"></p>
                    </div>

                    <div style="width:300px;margin-top: 20px;">
                        <p>ارزش خريد به نسبت قيمت</p>
                        <input type="range" min="0" max="5" step="1" name="range[2]" data-rangeslider
                               value="<?= get_item_value($score, 2)  ?>" id="range_2"/>
                        <p id="output_range_2"></p>
                    </div>

                    <div style="width:300px;margin-top: 20px;">
                        <p>نوآوري</p>
                        <input type="range" min="0" max="5" step="1" name="range[3]" data-rangeslider
                               value="<?= get_item_value($score, 3)  ?>" id="range_3"/>
                        <p id="output_range_3"></p>
                    </div>

                    <div style="width:300px;margin-top: 20px;">
                        <p>امکانات و قابليت ها</p>
                        <input type="range" min="0" max="5" step="1" name="range[4]" data-rangeslider
                               value="<?= get_item_value($score, 4) ?>" id="range_4"/>
                        <p id="output_range_4"></p>
                    </div>

                    <div style="width:300px;margin-top: 20px;">
                        <p>سهولت استفاده</p>
                        <input type="range" min="0" max="5" step="1" name="range[5]" data-rangeslider
                               value="<?= get_item_value($score, 5)  ?>" id="range_5"/>
                        <p id="output_range_5"></p>
                    </div>

                    <div style="width:300px;margin-top: 20px;">
                        <p>طراحي و ظاهر</p>
                        <input type="range" min="0" max="5" step="1" name="range[6]" data-rangeslider
                               value="<?= get_item_value($score, 6)  ?>" id="range_6"/>
                        <p id="output_range_6"></p>
                    </div>


                    @if(Auth::check())


                        @if(!$score)
                            <button class="button submit" style="float:left;" title="ثبت امتیاز"
                                    type="submit"><span><i
                                            class="fa fa-thumbs-up"></i> &nbsp;ثبت امتیاز</span>
                            </button>
                        @endif
                    @endif


                </form>

            </div>
        </div>
        <div class="col-sm-7 col-lg-7 col-md-7">
            <div class="reviews-content-right">
                <h2>نظر خود را درج نمایید</h2>

                <div class="row content_box form-area"
                     @if(!$score) style="background:#fff;opacity:0.5;cursor: not-allowed;" @endif>

                    <div class="col-md-12" id="comment_box">

                        {{--<p style="padding-top:30px;padding-bottom:20px">دیگران را با نوشتن نقد،
                            بررسی و
                            نظرات خود، برای انتخاب این محصول راهنمایی کنید.</p>--}}

                        <form action="{{ url('site/add_comment') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $product_id }}">
                            <div class="col-md-6">

                                <div class="form-element">
                                    <label>عنوان نقد و بررسی شما (اجباری)</label>
                                    <input @if(!$score) disabled="disabled" @endif type="text"
                                           name="subject">
                                </div>

                                {{--<div style="clear:both"></div>
                                <div class="form-group">
                                    <p style="color:green;padding-top: 10px;">نقاط قوت</p>
                                    <input @if(!$score) disabled="disabled" @endif  type="text"
                                           class="form-control advantages" name="advantages[]">
                                    <div class="icon-form-add" onclick="add_advantages()">+</div>
                                    <div class="icon-form-remove" onclick="remover_advantages()">-</div>
                                </div>
                                <div style="clear:both"></div>
                                <div id="advantages_box">

                                </div>--}}
                            </div>

                        {{--<div class="col-md-6">


                            <div class="form-group" style="margin-top:75px;">
                                <p style="color:red;padding-top: 10px;">نقاط ضعف</p>
                                <input @if(!$score) disabled="disabled" @endif type="text"
                                       class="form-control disadvantages" name="disadvantages[]">
                                <div class="icon-form-add" onclick="add_disadvantages()">+</div>
                                <div class="icon-form-remove" onclick="remover_disadvantages()">-</div>
                            </div>
                            <div style="clear:both"></div>
                            <div id="disadvantages_box">

                            </div>

                        </div>--}}

                    </div>


                    <div class="col-md-12" id="comment_text_box">
                        <div class="form-element" style="padding-right:15px;padding-top: 20px;">
                            <label>متن نقد و بررسی شما (اجباری)</label>
                            <textarea @if(!$score) disabled="disabled" @endif name="comment_text"></textarea>
                        </div>


                        @if($score)
                            <div style="margin-top: 5px">
                                <button class="button submit" style="float:left;" title="ثبت امتیاز"
                                        type="submit"><span><i
                                                class="fa fa-comment"></i> &nbsp;ثبت نقد و بررسی</span>
                                </button>
                            </div>

                        @else

                            <div style="padding-top:40px;clear:both"></div>

                        @endif


                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endif

<div style="height: 10px!important; margin-bottom: 10px">
    <p>
        @if(!Auth::check())
            <span>برای ثبت نظر می بایست ابتدا وارد سایت شوید!</span>
            <span> برای ورود و یا ثبت نام </span>
            <a href="{{route('login')}}">کلیک</a>
            <span>نمایید.</span>
        @endif
    </p>
</div>

@if(sizeof($productScores)>0)
    <div class="loading_box" id="loading_comment" style="padding-top:50px;padding-bottom: 40px;">
        <div class="loading"></div>
        <span>در حال دریافت اطلاعات</span>
    </div>



    <div class="row">
        <div id="comment_box">
            @foreach($productScores as $key=>$value)

                <div class="row user_comment_box" style="width:97%;margin:20px auto">


                    <div class="comment_header">

						<?php
						$jdf = new \App\lib\Jdf();
						$comment_data = $value->get_comment;
						?>
                        @if(!empty($value->get_user->name))

                            <p>{{ $value->get_user->name }}</p>
                        @else
                            <p>کاربر سایت</p>

                        @endif
                        <p style="font-size:11px">{{ $jdf->jdate('d F Y',$value->time) }}</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="rang_ul">


                            @foreach($item_name as $k=>$v)

                                <li>
                                    <span>{{ $v }}</span>
                                    <div class="rating-container">
                                        <div class="bar @if(score_check($value,$k)>=1) done @endif"></div>
                                        <div class="bar @if(score_check($value,$k)>=2) done @endif"></div>
                                        <div class="bar @if(score_check($value,$k)>=3) done @endif"></div>
                                        <div class="bar @if(score_check($value,$k)>=4) done @endif"></div>
                                        <div class="bar @if(score_check($value,$k)==5) done @endif"></div>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                        <div style="clear:both;padding-top: 30px;"></div>
                    </div>


                    @if($comment_data)

                        <div class="col-md-6">


                            <p style="margin-top: 35px;">{{ $comment_data->subject }}</p>

                            @if(!empty($comment_data->advantages))
                                <p style="color:green;padding-top:10px">نقاط قوت</p>
								<?php
								$advantages = explode('@$E@', $comment_data->advantages);
								?>
                                @foreach($advantages as $key=>$value)
                                    @if(!empty($value))
                                        <p>
                                            <span class="icon icon-arrow-top"></span>
                                            <span class="icon_span">{{ $value }}</span>
                                        </p>
                                    @endif
                                @endforeach
                            @endif

                            @if(!empty($comment_data->disadvantages))
                                <p style="color:red;padding-top:10px">نقاط ضعف</p>
								<?php
								$disadvantages = explode('@$E@', $comment_data->disadvantages);
								?>
                                @foreach($disadvantages as $key=>$value)
                                    @if(!empty($value))
                                        <p>
                                            <span class="icon icon-arrow-down"></span>
                                            <span class="icon_span">{{ $value }}</span>
                                        </p>
                                    @endif
                                @endforeach
                            @endif

                            <div style="text-align:justify;width:95%;padding-bottom:40px;">{{ $comment_data->comment_text }}</div>

                        </div>

                    @endif
                </div>

            @endforeach

            {!!  str_replace('site/ajax_get_tab_data','product/comment',$productScores->render()) !!}
        </div>
    </div>
@endif





