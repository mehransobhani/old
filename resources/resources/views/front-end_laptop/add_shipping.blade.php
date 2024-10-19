@extends('layouts.front-end')

@section('content')

    <div class="main-container col1-layout">

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul>
                            <li class="home"><a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span>
                            </li>

                            <li><strong>Contact Us</strong></li>
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
                                <h2>@lang('front-end.shipping.title')</h2>
                            </div>
                            <div id="message-box-conact">@lang('front-end.shipping.desc')</div>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    {{--<h3 class="page-subheading">Make an enquiry</h3>--}}
                                    <form action="{{route('site.insertShipping')}}" method="post">
                                        {{csrf_field()}}
                                        <div class="contact-form-box">
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.state')</label>
                                                <select name="ostan_id" id="ostan_id"
                                                        onchange="get_cities('ostan_id','city_list')"
                                                        class="form-control input-sm">
                                                    <option value="" @if(old('ostan_id')==null) selected @endif>
                                                        @lang('front-end.form.please_select')
                                                    </option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}"
                                                                @if(old('state_id')==$state->id) selected @endif>
                                                            {{$state->ostan_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('ostan_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ostan_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.city')</label>
                                                <select name="shahr_id" id="city_list" class="form-control input-sm">
                                                    <option value="" @if(old('shahr_id')==null) selected @endif>
                                                        @lang('front-end.form.please_select')
                                                    </option>
                                                </select>
                                                @if($errors->has('shahr_id'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('shahr_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.full_name')</label>
                                                <input type="text" class="form-control input-sm" id="name" name="name"/>
                                                @if($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.mobile')</label>
                                                <input type="text" class="form-control input-sm" id="mobile"
                                                       name="mobile"/>
                                                @if($errors->has('mobile'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.tell')</label>
                                                <input type="text" class="form-control input-sm" id="tell" name="tell"/>
                                                @if($errors->has('tell'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('tell') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.postal_code')</label>
                                                <input type="text" class="form-control input-sm" id="zip_code"
                                                       name="zip_code"/>
                                                @if($errors->has('zip_code'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('zip_code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <label>@lang('front-end.shipping.address')</label>
                                                <input type="text" class="form-control input-sm" id="address"
                                                       name="address"/>
                                                @if($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                            <div class="form-selector">
                                                <button class="button" type="submit"><i class="fa fa-save"></i>&nbsp;
                                                    <span>@lang('front-end.form.btn_save')</span></button>
                                                {{--<a href="{{route('site.shipping')}}" class="checkout-btn">@lang('front-end.btn_save_go_back')</a>--}}
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

    </div>

@endsection

@section('bottom_script')
	<?php $url = route('site.getCities'); ?>
    <script>
        get_cities = function (state_id, shahr_id) {
            var ostan_id = document.getElementById(state_id).value;
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'ostan_id=' + ostan_id,
                success: function (data) {
                    var shahr = $.parseJSON(data);
                    var html = '';
                    html += "<option value=''>@lang('front-end.form.please_select')</option>";
                    for (var i = 0; i < shahr.length; i++) {
                        html += '<option value=' + shahr[i].id + '>' + shahr[i].shahr_name + '</option>';
                    }
                    if (html.trim() != '') {
                        $("#" + shahr_id).html(html).selectpicker('refresh');
                    } else {
                        html += "<option value=''>@lang('front-end.form.please_select')</option>";
                        $("#" + shahr_id).html(html);
                    }
                }
            });
        };
    </script>

@endsection