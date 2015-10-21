@extends('layouts.landing')

@section('title') {{ $productcategory->title }} @stop



@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    <div class="row">

    <div class="col-md-3">

        @include('inc.products_nav')

    </div>

    <div class="col-md-9">

                        <div class="products-subheader">
                            <h3 class="products-subheader-title">{{ $productcategory->title }}</h3>
                        </div>

                        @foreach($subcategories as $key => $value)

                            <div class="product-listitem row" itemscope itemtype="http://schema.org/IndividualProduct">


                                <figure class="product-listitem-thumbnail thumbnail col-md-2">


                                   @foreach($value->files as $k => $file)

                                    @if ($value->default_image == $file->id)

                                        <img src="{{ URL::to('/') }}/{{ Config::get('uploads.square') }}/{{ $file->file_name }}" alt="">

                                    @endif

                                   @endforeach

                                </figure>

                                <div class="product-listitem-title col-md-8">
                                    <h3 itemprop="name"><a itemprop="url" href="{{ URL::to('products/' .$productcategory->id .'/detail/' . $value->id) }}">{{ $value->title }}</a></h3>
                                    <p itemprop="description">{{ $value->short_description }}</p>
                                </div>

                                <div class="product-listitem-links col-md-2">
                                        <p><a itemprop="url" href="{{ URL::to('products/' .$productcategory->id .'/detail/' . $value->id) }}" class="btn btn-default" role="button">View Product</a></p>
                                </div>

                                </div>







                       @endforeach

    </div>

    </div>

@stop