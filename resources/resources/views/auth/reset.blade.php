@extends('layouts.front-end')

@section('content')

    <div class="main container">

        <div class="page-content">

            <div class="account-login">
                <div class="box-authentication">
                    <h4>@lang('front-end.auth.reset')</h4>
                    {{--<p class="before-login-text">@lang('front-end.auth.login_title')</p>--}}
                    <form method="post" action="{{ route('sendCode') }}">
                        {{ csrf_field() }}
                     <small>شماره موبایلی که قبلا با آن ثبت نام کرده اید را وارد نمایید و سپس روی گزینه بازیابی رمز عبور کلیک کنید :</small>
                        <input id="username" type="text" class="form-control" name="username"
                               value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                        <button class="button"><i class="fa fa-lock"></i>&nbsp;
                            <span>@lang('front-end.auth.reset')</span></button>
                         @if(session("error"))
                            <div style="color: red;font-weight: bold;margin-top: 15px">
                                {{session("error")}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
<style>
    .box-authentication{
        float: none!important;
        display: block!important;
        padding: 100px;
        border: 1px solid #eee;
        width: 100% !important;
        border-radius: 10px;
    }
</style>
@endsection
