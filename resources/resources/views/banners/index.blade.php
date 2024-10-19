@extends('layouts/admin')
@section('header')
    <title>مدیریت بنر ها</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت بنر ها</span>
    </div>

    <div>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>عنوان</th>
                <th>تصویر</th>
                <th>عملیات</th>
            </tr>
            </thead>


			<?php $i = 1; ?>
            @foreach($banners as $key=>$value)

                <tr>
                    <td>{{ $i }}</td>
                    <td style="min-width: 100px;">{{ $value->name }}</td>
                    <td>
                        <img src="{{ url('upload').'/'.$value->img }}" style="width:70%">
                    </td>

                    <td>
                        <a style="color: #368bff" href="{{ route('admin.editBanner',[$value->id]) }}"><span
                                    class="fa fa-edit"></span>
                        </a>
                    </td>
                </tr>
				<?php $i++; ?>
            @endforeach

            @if(sizeof($banners)==0)
                <tr>
                    <td colspan="4">رکوردی یافت نشد</td>
                </tr>
            @endif
        </table>
    </div>
@endsection

