@extends('layouts/admin')
@section('header')
    <title>مدیریت اخبار</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت اخبار</span>
    </div>

    <div>
        <a href="{{route('admin.createNews')}}" class="btn btn-success">افزودن خبر</a>
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
            @foreach($news as $key=>$value)

                <tr>
                    <td>{{ $i }}</td>
                    <td style="min-width: 100px;">{{ $value->title}}</td>
                    <td>
                        <img src="{{ url('upload').'/'.$value->img }}" style="width:70%">
                    </td>

                    <td>
                        <a style="color: #368bff" href="{{ route('admin.editNews',[$value->id ]) }}"><span
                                    class="fa fa-edit"></span></a>
                        <a style="color:red;cursor:pointer;padding-right:5px"
                           onclick="del_row('<?= $value->id ?>','<?= url('admin/slider') ?>','<?= Session::token() ?>')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
				<?php $i++; ?>
            @endforeach

            @if(sizeof($news)==0)
                <tr>
                    <td colspan="4">رکوردی یافت نشد</td>
                </tr>
            @endif
        </table>
        {{ $news->links() }}
    </div>
@endsection

