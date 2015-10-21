@extends('layouts.master')

@section('title') Products @stop
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

     <h2>{{ $parentcategory->title }}</h2>
     <h3>{{ $productcategory->title }}</h3>

    @if ($products)
        @foreach($products as $key => $value)
        <div class="product">
            <h3>{{ $value->model_id }}</h3>
            <p><a href="{{ URL::to('product/' . $value->id) }}">View Product</a></p>
        </div>
       @endforeach
   @endif

@stop