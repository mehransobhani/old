@extends('layouts/admin')

@section('header')
    <title>افزودن خبر</title>
@endsection

@section('content')

    <div class="box_title">
        <span>افزودن خبر</span>
    </div>

    {!! Form::open(['url'=>route('admin.storeNews'),'files'=>'true']) !!}


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
        {!! Form::label('img','انتخاب تصویر : ') !!}
        <img src="{{ url('images/pic_1.jpg') }}" id="output" width="150" onclick="select_file()">

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