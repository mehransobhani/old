@extends('layouts.front-end')

@section('content')

    <div class="main container">

        <div class="page-content">

            <div class="account-login">
                <div class="box-authentication">
                    <h4>@lang('front-end.auth.register_title')</h4>
                    {{--<p>Create your very own account</p>--}}
                    <form method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <input id="username" type="hidden" name="username" class="form-control" value="{{ old('username',$phone) }}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>شماره موبایل نمیتواند خالی باشد .</strong>
                                    </span>
                        @endif
                        <label for="password_login">@lang('front-end.auth.password')<span
                                class="required">*</span></label>
                                  <br/>
                                                                <small>برای حساب کاربری خود رمزی انتخاب کنید که حداقل شامل 6 کاراکتر باشد .</small>

                        <input id="password_login" type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <button class="button" type="submit"><i class="fa fa-user"></i>&nbsp;
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
    <style>
        .box-authentication {
            float: none !important;
            display: block !important;
            padding: 100px;
            border: 1px solid #eee;
            width: 100% !important;
            border-radius: 10px;
        }
    </style>
@endsection

@section('bottom_script')
    <script>
        $(document).ready(function () {
            // Set the countdown time in seconds
            var countdownTime = 10;

            // Update the countdown every second
            var countdown = setInterval(function () {
                // Calculate minutes and seconds
                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;

                // Display the countdown
                $("#countdown").html("<strong class='text-danger' style='margin: auto 10px'>" + seconds + " : " + minutes + "</strong>");

                // Decrease the countdown time
                countdownTime--;

                // If the countdown is finished, display a message
                if (countdownTime < 0) {
                    clearInterval(countdown);
                    $("#resend").removeClass('hidden');
                }
            }, 1000);
        });
    </script>
@endsection
