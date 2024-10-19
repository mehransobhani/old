@extends('layouts.front-end')

@section('content')

    <div class="main container">

        <div class="page-content">
              @if(session("changePassword"))
                <div class="alert alert-success">
                    {{session("changePassword")}}
                </div>
            @endif

            <div class="account-login">


                <div class="box-authentication">
                    <h4>@lang('front-end.auth.login_title')</h4>
                    {{--<p class="before-login-text">@lang('front-end.auth.login_title')</p>--}}
                    <form method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <label for="emmail_login">@lang('front-end.auth.user_name')<span
                                    class="required">*</span></label>
                        <input id="emmail_login" type="text" class="form-control" name="username"
                               value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                        <label for="password_login">@lang('front-end.auth.password')<span
                                    class="required">*</span></label>
                        <input id="password_login" type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <p class="forgot-pass"><a href="{{route("resetPasswordView")}}">@lang('front-end.auth.forget_password_lbl')</a></p>
                        <button class="button"><i class="fa fa-lock"></i>&nbsp;
                            <span>@lang('front-end.auth.login_btn')</span></button>
                        <label class="inline" for="rememberme">
                            <input type="checkbox" value="forever" id="rememberme"
                                   name="rememberme"> @lang('front-end.auth.remember_me')
                        </label>

                    </form>
                </div>
                     <div class="box-authentication">
                    <h4>@lang('front-end.auth.register_title')</h4>
                    {{--<p>Create your very own account</p>--}}
                    <form method="get" action="{{ route('register.submit-code') }}">
                        {{ csrf_field() }}
                        <label for="emmail_register">@lang('front-end.auth.user_name')<span
                                    class="required">*</span></label>
                                    <br/>
                                    <small>شماره موبایل خود را وارد نمایید : </small>
                        <input id="emmail_register" type="text" name="phone" class="form-control">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>شماره موبایل نمیتواند خالی باشد .</strong>
                                    </span>
                        @endif
                        
                        <button class="button "><i class="fa fa-user"></i>&nbsp;
                            <span>@lang('front-end.auth.register_btn')</span></button>

                        @if(session("error"))
                            <div style="color: red;font-weight: bold;margin-top: 15px">
                                {{session("error")}}
                            </div>
                        @endif
                    </form>
                    {{--<div class="register-benefits">
                        <h5>Sign up today and you will be able to :</h5>
                        <ul>
                            <li>Speed your way through checkout</li>
                            <li>Track your orders easily</li>
                            <li>Keep a record of all your purchases</li>
                        </ul>
                    </div>--}}
                </div>
            </div>
        </div>

    </div>

@endsection


@section('bottom_script')
    <script>
        function convertPersianToEnglish(input) {
            var persianNumbers = [/۰/g, /۱/g, /۲/g, /۳/g, /۴/g, /۵/g, /۶/g, /۷/g, /۸/g, /۹/g];
            var englishNumbers = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];

            var inputValue = input.value;
            for (var i = 0; i < persianNumbers.length; i++) {
                inputValue = inputValue.replace(persianNumbers[i], englishNumbers[i]);
            }

            input.value = inputValue;
        }
    </script>

@endsection