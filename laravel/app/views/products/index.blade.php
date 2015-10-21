@extends('layouts.master')

@section('title') Products @stop
@section('content')

    @if (Session::has('message'))
        <div class="alert-block">{{ Session::get('message') }}</div>
    @endif

    @foreach($productcategory as $key => $value)
    <div class="product">
            <h3>{{ $value->title }}</h3>
            <p><a href="{{ URL::to('product-category/' . $value->id) }}">View Products</a></p>
       </div>
    @endforeach




@stop