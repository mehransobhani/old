@extends('layouts/admin')

@section('header')
    <title>ویرایش خبر</title>
@endsection

@section('content')

    <div class="box_title">
        <span>ویرایش خبر  - {{ $news->title }}</span>
    </div>

    {!! Form::model($news,['url'=>route('admin.updateNews',[$news->id]),'files'=>'true']) !!}

    {{ method_field('PUT') }}


    <div class="form-group">
        {!! Form::label('title','عنوان : ') !!}
        {!! Form::text('title',null,['class'=>'form-control','style'=>'width:75%']) !!}
        @if($errors->has('title'))
            <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::textArea('content',null,['class'=>'ckeditor','id'=>'my-editor']) !!}
        @if($errors->has('content'))
            <span style="color:red;font-size:13px">{{ $errors->first('content') }}</span>
        @endif
    </div>

    <div class="form-group">
        <input type="file" name="img" id="img" onchange="loadFile(event)" style="display:none">
        {!! Form::label('pic','انتخاب تصویر : ') !!}
        @if(!empty($news->img))
            <img src="{{ url('upload').'/'.$news->img }}" id="output" width="150" onclick="select_file()">
            <br>
            <p style="color:red;padding-right:160px;padding-top:10px;cursor:pointer"
               onclick="del_img('<?= $news->id ?>','<?= url('admin/news/del_img') ?>','<?= Session::token() ?>')">
                حذف تصویر</p>
        @else
            <img src="{{ url('images/pic_1.jpg') }}" id="output" width="150" onclick="select_file()">
        @endif


    </div>

    <div class="form-group">
        @if($errors->has('img'))
            <span style="color:red;font-size:13px">{{ $errors->first('img') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
@endsection

@section('footer')
    <script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
    <script>
        select_file = function () {
            document.getElementById('img').click();
        };
        loadFile = function (event) {
            var render = new FileReader;
            render.onload = function () {
                var output = document.getElementById('output');
                output.src = render.result;
            };
            render.readAsDataURL(event.target.files[0]);
        }

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };

        CKEDITOR.replace('my-editor', options);
    </script>
@endsection