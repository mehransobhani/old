@extends('layouts/admin')


@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('header')
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width:65%;
        }
        .bootstrap-select.btn-group .dropdown-toggle .caret
        {
            right: 95%;
        }
    </style>
    <title>افزودن محصول</title>
@endsection


@section('content')

    <div class="box_title">
        <span>افزودن محصول</span>
    </div>

    {!! Form::open(['url'=>'admin/product','files'=>'true']) !!}


    <div class="form-group">
        {!! Form::label('title','عنوان محصول : ') !!}
        {!! Form::text('title',null,['class'=>'form-control','style'=>'width:75%']) !!}
        @if($errors->has('title'))
            <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::textArea('text',null,['class'=>'ckeditor']) !!}
        @if($errors->has('text'))
            <span style="color:red;font-size:13px">{{ $errors->first('text') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('cat_id','انتخاب سر دسته : ') !!}
        {!! Form::select('cat[]',$cat_list,null,['class'=>'selectpicker','data-live-search'=>'true','multiple'=>'multiple']) !!}
       <br>
        @if($errors->has('cat'))
            <span style="color:red;font-size:13px">{{ $errors->first('cat') }}</span>
        @endif
    </div>


    <div class="form-group">
        {!! Form::label('code','نام لاتین محصول : ') !!}
        {!! Form::text('code',null,['class'=>'form-control','style'=>'text-align:left']) !!}
        @if($errors->has('code'))
            <span style="color:red;font-size:13px">{{ $errors->first('code') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('price','هزینه محصول : ') !!}
        {!! Form::text('price',null,['class'=>'form-control','placeholder'=>'بر حسب تومان']) !!}
        @if($errors->has('price'))
            <span style="color:red;font-size:13px">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('discounts','تخفیف : ') !!}
        {!! Form::text('discounts',null,['class'=>'form-control','placeholder'=>'بر حسب تومان']) !!}
        @if($errors->has('discounts'))
            <span style="color:red;font-size:13px">{{ $errors->first('discounts') }}</span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('product_number','تعداد محصول : ') !!}
        {!! Form::text('product_number',null,['class'=>'form-control']) !!}
    </div>

    {{--<div class="form-group">
        {!! Form::label('bon','تعداد بن خرید محصول : ') !!}
        {!! Form::text('bon',null,['class'=>'form-control']) !!}
        @if($errors->has('bon'))
            <span style="color:red;font-size:13px">{{ $errors->first('bon') }}</span>
        @endif
    </div>--}}

    <div class="form-group">
        {!! Form::label('product_status','وضعیت محصول : ') !!}
        {!!  Form::checkbox('product_status', 1) !!} موجود
    </div>

    <div class="form-group">
        {!! Form::label('show_product','نمایش محصول : ') !!}
        {!!  Form::checkbox('show_product', 1) !!}
    </div>

    <div class="form-group">
        {!! Form::label('special','پیشنهاد ويژه : ') !!}
        {!!  Form::checkbox('special', 1) !!}
    </div>
      <div class="form-group">
        {!! Form::label('limited','محدودیت : ') !!}
        {!!  Form::checkbox('limited', 1) !!}
    </div>
    
    
    <div class="form-group">
        {!! Form::label('delivery_time','زمان ارسال : ') !!}
        {!! Form::text('delivery_time',null,['class'=>'form-control','style'=>'text-align:left']) !!}
        @if($errors->has('delivery_time'))
            <span style="color:red;font-size:13px">{{ $errors->first('delivery_time') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label>انتخاب رنگ</label>
    </div>
    <div style="clear:both"></div>
    <div class="form-group">
        <input type="text" name="color_name[]" class="color_input_name">
        <input type="text" class="jscolor color_input_code" name="color_code[]">
        <input type="text" placeholder="قیمت" class="form-control" name="color_price[]">
        <input type="text" placeholder="موجودی" class="form-control" name="color_inventory[]">
    </div>

    <div id="color_box">

    </div>

    <div class="form-group">
        <span class="fa fa-plus" style="color:red;cursor:pointer" onclick="add_color()"></span>
    </div>

    <div class="form-group">
        <label>افزودن برچسب</label>
        <input type="text" name="tag_list" id="tag_list" class="form-control" style="float:right;width:60%">
        <div class="add_product_tag" onclick="add_tag()">افزودن</div>
        <input type="hidden" name="keywords" id="keywords">
     </div>

    <div style="clear:both"></div>
    <div id="tag_box">

    </div>

    <div style="clear:both;padding-top:30px;"></div>
    <div class="form-group">
        {!! Form::label('description','description : ') !!}
        {!! Form::textArea('description',null,['style'=>'width:75%']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('ثبت',['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
@endsection

@section('footer')
<script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
<script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ url('js/jscolor.js') }}"></script>
<script>
add_color=function ()
{
    var count=document.getElementsByClassName('color_input_name').length;
    var html='<div id="color_div_'+count+'" class="form-group"></div>';
    var input1='<input type="text" name="color_name[]" class="color_input_name">';

    var input2=document.createElement('input');
    input2.name='color_code[]';
    input2.className='color_input_code';

    var input3=document.createElement('input');
    input3.name='color_price[]';
    input3.className='form-control';
    input3.placeholder='قیمت';
    
    
    
    var input4=document.createElement('input');
    input4.name='color_inventory[]';
    input4.className='form-control';
    input4.placeholder='موجودی';
    
    var color=new jscolor(input2);
    $("#color_box").append(html);

    $("#color_div_"+count).append(input1);
    $("#color_div_"+count).append(input2);
    $("#color_div_"+count).append(input3);
    $("#color_div_"+count).append(input4);
};
add_tag=function ()
{
  var tag_list=document.getElementById('tag_list').value;
  var t=tag_list.split(',');
  var keywords=document.getElementById('keywords').value;
  var string=keywords;
  var count=document.getElementsByClassName('tag_div').length+1;
  for(var i=0;i<t.length;i++)
  {
      if(t[i].trim()!='')
      {
          var n=keywords.search(t[i]);
          if(n==-1)
          {
              var r="'"+t[i]+"'";
              string=string+","+t[i];
              var tag='<div class="tag_div" id="tag_div_'+count+'">' +
                   '<span class="fa fa-remove" onclick="remove_tag('+count+','+r+')"></span>'+t[i];
                  '</div>';
              $("#tag_box").append(tag);

              count++;
          }
      }
  }
    document.getElementById('keywords').value=string;
    document.getElementById('tag_list').value='';
};
remove_tag=function (id,text)
{
    $("#tag_div_"+id).hide();
    var keywords=document.getElementById('keywords').value;
    var t=text+",";
    var t2=","+text;
    var a=keywords.replace(t,'');
    var b=a.replace(t2,'');
    document.getElementById('keywords').value=b;
}
</script>
@endsection