@extends('layouts.front-end')

@section('content')

    <div class="main container">

        <div class="page-content">

            <div class="account-login">
                <div class="box-authentication">
                     {{--<p class="before-login-text">@lang('front-end.auth.login_title')</p>--}}
                    <form method="post" action="{{ route('submit-code') }}">
                        {{ csrf_field() }}
                        <input id="id" type="hidden" class="form-control" name="id"
                               value="{{$id }}">
                        <label for="username"> بازیابی رمز عبور<span
                                class="required">*</span></label>
                                <br/>
                                <small>
                                    کد بازیابی رمز عبور ارسال شده به شماره موبایل خود را وارد نمایید و سپس روی گزینه ثبت کد کلیک کنید : 
                                </small>
                        <input id="code" type="text" class="form-control" name="code"
                               value="{{ old('code') }}">

                        <button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp;
                            <span>ثبت کد </span></button>




                    </form>
                       <br/>
                      <br/>
                    <form method="post" action="{{ route('sendCode') }}" id="">
                        <div style="width:100%;">
                        {{ csrf_field() }}
                        <input id="username" type="hidden" class="form-control" name="username"
                               value="{{$userName }}">
                        <span  style="display:inline-block" class="timer" id="countdown" style="width:200px;">
                            <strong class='text-danger' style='margin: auto 10px'>
                            2:0
                            </strong>
                        </span>
                        <button class="text-info btn hid" id="resend" style="background-color: transparent; margin-right: 10px;cursor: pointer">  ارسال مجدد کد</button>
                        <span    class='text-danger' id="resendText">تا ارسال مجدد کد</span>
</div>
                    </form>
                    @if(session("error"))
                        <div style="color: red;font-weight: bold;margin-top: 15px">
                            {{session("error")}}
                        </div>
                    @endif
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
        
         @media only screen and (min-width: 1px) and (max-width: 479px) {
        .box-authentication{
            padding: 5px!important;
        }
    }
        .hid{
        display:none;
    }
    </style>
@endsection

@section('bottom_script')
    <script>
        $(document).ready(function () {
            // Set the countdown time in seconds
            var countdownTime = 120;

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
                    $("#resend").removeClass('hid');
                                        $("#resendText").addClass('hid');

                }
            }, 1000);
        });
    </script>
@endsection
