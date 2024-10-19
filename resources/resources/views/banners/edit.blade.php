@extends('layouts/admin')


@section('header')
    <title>ویرایش اسلایدر</title>
@endsection

@section('content')

    <div class="box_title">
        <span>ویرایش بنر  - {{ $banner->name }}</span>
    </div>

    {!! Form::model($banner,['url'=>route('admin.updateBanner',[$banner->id]),'files'=>'true']) !!}

    {{ method_field('POST') }}

    <div class="form-group">
        {!! Form::label('title','عنوان : ') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
        @if($errors->has('title'))
        <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('descriptions','توضیحات : ') !!}
        {!! Form::text('descriptions',null,['class'=>'form-control']) !!}
        @if($errors->has('descriptions'))
        <span style="color:red;font-size:13px">{{ $errors->first('descriptions') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('url','آدرس بنر : ') !!}
        {!! Form::text('url',null,['class'=>'form-control']) !!}
        @if($errors->has('url'))
            <span style="color:red;font-size:13px">{{ $errors->first('url') }}</span>
        @endif
    </div>



    <div class="form-group">
        <input type="file" name="img" id="img" onchange="loadFile(event)" style="display:none">
        {!! Form::label('pic','انتخاب تصویر : ') !!}
        @if(!empty($banner->img))
            <img src="{{ url('upload').'/'.$banner->img }}" id="output" width="150" onclick="select_file()">

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
        {!! Form::submit('ویرایش',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}


@endsection


@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
<script>
select_file=function ()
{
   document.getElementById('img').click();
};
loadFile=function (event)
{
    var render=new FileReader;
    render.onload=function ()
    {
        var output=document.getElementById('output');
        output.src=render.result;
    };
    render.readAsDataURL(event.target.files[0]);
}
</script>
@endsection
