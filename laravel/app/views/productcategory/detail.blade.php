@extends('layouts.landing')

@section('title') {{{ $productcategory->title }}} @stop



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
            <h3 class="products-subheader-title">{{ $productcategory->title }} </h3>
        </div>


            <section class="product-detail">
                <div class="product-header">
                    <h4 class="product-header-title">{{{$product->title}}}</h4>
                    <p class="product-header-description">{{{$product->short_description}}}</p>
                </div>

                <div class="row">

                    <div class="col-md-6">

                            <div class="product-description">
                                {{$product->long_description}}
                            </div>

                            @if ($product->product_features)
                                <div class="product-features panel panel-default">
                                    <div class="panel-heading">
                                    <h3 class="panel-title">Product Features</h3>
                                  </div>
                                  <div class="panel-body">
                                    {{$product->product_features}}
                                  </div>
                                </div>
                            @endif





                    </div>

                    <div class="col-md-6">

                            @if (!is_null($image))
                            <div class="product-image">
                                <figure>
                                    <img src="{{ URL::to('/').'/'.Config::get('uploads.large').'/'.$image->file_name }}" alt="">
                                </figure>

                            </div>
                            @endif



                            @if(isset($files['Warranty Icon']))
                            <div class="product-icons product-warranty-icons">
                                    @foreach($files['Warranty Icon'] as $file)
                                        <img src="{{ URL::to('/').'/'.Config::get('uploads.small').'/'.$file['file_name'] }}" alt="">
                                    @endforeach
                            </div>
                            @endif


                            @if(isset($files['Product Icon']))
                            <div class="product-icons product-warranty-icons">
                                    @foreach($files['Product Icon'] as $file)
                                        <img src="{{ URL::to('/').'/'.Config::get('uploads.small').'/'.$file['file_name'] }}" alt="">
                                    @endforeach
                            </div>
                            @endif

                            @if(isset($files['Warranty']))
                            <div class="product-downloads product-downloads-brochure">

                                <div class="panel panel-default">

                                        <div class="panel-heading">Warranty Downloads</div>

                                        <div class="list-group">
                                            @foreach($files['Warranty'] as $file)
                                            <a href="{{ URL::to('/').'/'.Config::get('uploads.originals').'/'.$file['file_name'] }}" class="list-group-item">{{{ $file['file_title'] }}}</a>
                                            @endforeach
                                        </div>
                                    </div>

                            </div>
                            @endif

                            @if(isset($files['Brochure']))
                            <div class="product-downloads product-downloads-brochure">

                                <div class="panel panel-default">

                                        <div class="panel-heading">Brochure Downloads</div>

                                        <div class="list-group">
                                            @foreach($files['Brochure'] as $file)
                                                <a href="{{ URL::to('/').'/'.Config::get('uploads.originals').'/'.$file['file_name'] }}" class="list-group-item">
                                                    <span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> {{{ $file['file_title'] }}}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                            </div>
                            @endif


                    </div>


                </div>

            </section>

        </div>
    </div>






@stop