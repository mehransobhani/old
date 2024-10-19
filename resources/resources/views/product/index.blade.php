@extends('layouts/admin')
@section('style')
    <link href="{{ url('css/bootstrap-select.css') }}" rel="stylesheet">
@endsection
@section('header')
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 65%;
        }

        .bootstrap-select.btn-group .dropdown-toggle .caret {
            right: 95%;
        }
    </style>
    <title>مدیریت محصولات</title>
@endsection

@section('content')

    <div class="box_title">
        <span>مدیریت محصولات</span>
    </div>

    <div>
        <a href="{{ url('admin/product/create') }}" class="btn btn-success">افزودن محصول</a>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>تصویر شاخص</th>
                <th>عنوان محصول</th>
                <th>دسته بندی</th>
                <th>تاریخ انتشار</th>
                <th>وضعیت</th>
                <th>تعداد فروش</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <form action="{{ url('admin/product') }}" id="search_form" class="">
                <tr>
                    <td></td>
                    <td></td>
                    <td><input value="@if(array_key_exists('title',$data)){{ $data['title'] }}@endif" type="text"
                               name="title" class="form-control search_input" style="width:100%"></td>
                    <td>
                        {{--<div class="form-group">
                        {!! Form::select('cat[]',$cat_list,['class'=>'selectpicker','data-live-search'=>'true','id'=>'cat_list']) !!}
                        </div>--}}
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </form>

			<?php $i = 1; ?>
            @foreach($product as $key=>$value)

                <tr>
                    <td>{{ $i }}</td>
                    <td>
						<?php
						$get_img = $value->get_img;
						if($get_img)
						{
						?>
                        <img src="{{ url('upload').'/'.$get_img->url }}" style="width:150px">
						<?php
						}
						?>
                    </td>
                    <td>{{ $value->title }}</td>

                    <td>
                        @foreach($value->categories as $category)
                            <a href="{{route('category.index')}}">
                                {{$category->cat_name}}
                            </a>

                            @if(!$loop->last)
                                <span> | </span>
                            @endif

                        @endforeach
                    </td>

                    <td></td>
                    <td>
                        @if($value->product_status==1)
                            <span style="color: blue">موجود</span>
                        @else
                            <span style="color:red">نا موجود</span>
                        @endif
                    </td>
                    <td>{{ $value->order_product }}</td>
                    <td>
                        <a title="ویرایش" style="color: #368bff"
                           href="{{ url('admin/product').'/'.$value->id.'/edit' }}"><span
                                    class="fa fa-edit"></span></a>
                        <a title="گالری تصاویر" style="color: #368bff"
                           href="{{ url('admin/product/gallery?id=').$value->id}}"><span
                                    class="fa fa-image"></span></a>
                        <a title="بررسی تخصصی" style="color: #368bff"
                           href="{{ url('admin/product/add-review?product_id=').$value->id}}"><span
                                    class="fa fa-list-alt"></span></a>
                        <a title="ویژگی های محصول" style="color: #368bff"
                           href="{{ url('admin/product/add-item/'.$value->id)}}"><span
                                    class="fa fa-bars"></span></a>
                        <a title="فیلتر های محصول" style="color: #368bff"
                           href="{{ url('admin/product/add-filter/'.$value->id)}}"><span
                                    class="fa fa-filter"></span></a>
                        {{--<a title="گارانتی های محصول" style="color: #368bff"
                           href="{{ url('admin/service?product_id=').$value->id}}"><span
                                    class="fa fa-ambulance"></span></a>--}}
                        <a style="color:red;cursor:pointer;padding-right:5px"
                           onclick="del_row('<?= $value->id ?>','<?= url('admin/product') ?>','<?= Session::token() ?>')">
                            <span class="fa fa-trash"></span>
                        </a>
                    </td>
                </tr>
				<?php $i++; ?>
            @endforeach

            @if(sizeof($product)==0)
                <tr>
                    <td colspan="6">رکوردی یافت نشد</td>
                </tr>
            @endif
        </table>
        {{ $product->links() }}
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ url('js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/defaults-fa_IR.js') }}"></script>
@endsection