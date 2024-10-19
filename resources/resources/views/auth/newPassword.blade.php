@extends('layouts.front-end')

@section('content')

    <div class="main container">

        <div class="page-content">

            <div class="account-login">
                <div class="box-authentication">
                    <h4>@lang('front-end.auth.reset')</h4>
                    {{--<p class="before-login-text">@lang('front-end.auth.login_title')</p>--}}
                    <form method="post" action="{{ route('reset-password') }}">
                        {{ csrf_field() }}
                        <input id="username" type="hidden" class="form-control" name="id"
                               value="{{$id }}">


                        <label for="username">رمز عبور جدید<span
                                class="required">*</span></label>
                                <br/>
                        <small>برای حساب کاربری خود رمز عبور جدید انتخاب کنید که شامل  حداقل  6 کاراکتر باشد و سپس روی گزینه تایید رمز عبور کلیک کنید  .</small>

                        <input id="newPassword" type="password" class="form-control" name="newPassword"
                               value="{{ old('newPassword') }}">

                        <button class="button"><i class="fa fa-lock"></i>&nbsp;
                            <span>
                                تایید رمز عبور
                                </span></button>

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
