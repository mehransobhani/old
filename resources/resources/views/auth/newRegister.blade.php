@extends('layouts.front-end')

@section('content')

    <div class="main container">
 
        <div class="page-content">

            <div class="account-login">
                <div class="box-authentication">
                    <h4>@lang('front-end.auth.register_title')</h4>
                    {{--<p class="before-login-text">@lang('front-end.auth.login_title')</p>--}}
                    <form method="get" action="{{ route('register.final') }}">
                        {{ csrf_field() }}
                                                       

                        <input id="phone" type="hidden" class="form-control" name="phone"
                               value="{{$phone }}">
                        <label for="username">کد ثبت نام<span
                                class="required">*</span></label>
                                  <br/>
                                  <small>
                                      کد ارسال شده به شماره موبایل خود را وارد نمایید و سپس روی ثبت کد کلیک کنید :
                                  </small>
                                
                        <input id="username" type="text" class="form-control" name="code"
                               value="{{ old('code') }}">

                        <button class="button" type="submit"><i class="fa fa-lock"></i>&nbsp;
                            <span>ثبت کد </span></button>




                    </form>
                      <br/>
                      <br/>
                    <form method="get" action="{{ route('register.submit-code') }}" id="">
                        {{ csrf_field() }}
                        <input id="phone" type="hidden" class="form-control" name="phone"
                               value="{{$phone }}">
                    <span class="timer" id="countdown"  style="width:200px;">
                            <strong class='text-danger' style='margin: auto 10px'>
                            2:0
                            </strong>
                        </span>
                                                <button class="text-info btn hid" id="resend" style="background-color: transparent; margin-right: 10px;cursor: pointer">  ارسال مجدد کد</button>

                        <span  class='text-danger' id="resendText">تا ارسال مجدد کد</span>

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
            var countdownTime = <?= $limit??120 ?>;

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
