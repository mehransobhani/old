@extends('layouts.front-end')

@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet">
    <link href="{{ url('css/site.css') }}" rel="stylesheet">
@endsection

@section('content')
     <div class="card">
        <h2 class="card__msg bg-danger" style="padding: 20px 0">متاسفانه پرداخت شما نا موفق بود</h2>
        <div class="card__body">
           <strong>
               در صورت کم شدن مبلغ از حساب شما این مبلغ به حساب شما برمیگردد .
           </strong>
        </div>
        <div >
            <a class="btn btn-danger " style="margin-top: 15px" href="{{ route('site.shipping') }}">بازگشت</a>
        </div>
        <div class="card__tags">
            <span class="card__tag">تجهیزلند</span>
            <span class="card__tag"></span>
        </div>
    </div>

<style>
    .card {
        background-color: #fff;
        width: 100%;
        float: left;
        margin-top: 40px;
        border-radius: 5px;
        box-sizing: border-box;
        padding: 80px 30px 25px 30px;
        text-align: center;
        position: relative;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
    }
    .card__success i {
        color: #fff;
        line-height: 100px;
        font-size: 45px;
    }
    .card__msg {
        text-transform: uppercase;
        color: #55585b;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .card__body {
        background-color: #f8f6f6;
        border-radius: 4px;
        width: 100%;
        margin-top: 30px;
        float: left;
        box-sizing: border-box;
        padding: 30px;
    }


    .card__tags {
        clear: both;
        padding-top: 15px;
    }
    .card__tag {
        text-transform: uppercase;
        background-color: #f8f6f6;
        box-sizing: border-box;
        padding: 3px 5px;
        border-radius: 3px;
        font-size: 10px;
        color: #d3cece;
    }

</style>
@endsection
