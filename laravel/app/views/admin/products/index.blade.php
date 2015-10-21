@extends('admin.layouts.admin')

@section('title') Products
    @if (isset($parentcategory->title))
        <small>{{ $parentcategory->title }}</small>
    @endif
@stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif



    <div class="table-responsive">
   <table class="table table-striped">
    <tr>
        <th>Category</th>

        <th></th>
    </tr>


    @foreach($productcategories as $key => $value)
    <tr @if(!$value->product_active) class="danger" @endif >
            <td><strong>{{ $value->title }}</strong></td>
            <td class="text-right">
                {{ Form::open(array('url' => 'admin/products/' . $value->id , 'class' => 'form-inline')) }}
                    <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $value->id.'/edit') }}">Edit</a>
                    <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $value->id.'/files') }}">Files {{ $value->files->count() ? '(' .$value->files->count() .')' : '' }}</a>


                     <!--   <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $value->id.'/subcategories') }}">Subcategories</a> -->


                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete')) }}
                {{ Form::close() }}

            </td>
    </tr>

        @foreach($productcategories->find($value->id)->children as $ckey => $cvalue)


            <tr @if(!$value->product_active || !$cvalue->product_active) class="danger" @endif >
                <td>   --   {{ $cvalue->title }}</td>
                <td class="text-right">
                {{ Form::open(array('url' => 'admin/products/' . $cvalue->id , 'class' => 'form-inline')) }}
                    <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $cvalue->id.'/edit') }}">Edit</a>
                    <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $cvalue->id.'/files') }}">Files {{ $cvalue->files->count() ? '(' .$cvalue->files->count() .')' : '' }}</a>
                    <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $cvalue->id.'/models') }}">Models</a>
                    @if (!$cvalue->parent_category)
                        <a class="btn btn-primary" href="{{ URL::to('admin/products/' . $cvalue->id.'/subcategories') }}">Subcategories</a>
                    @endif

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete')) }}
                    {{ Form::close() }}
                </td>
            </tr>

        @endforeach

    @endforeach

    </table>
    </div>

@stop