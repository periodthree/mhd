@extends('layouts.landing')

@section('title') Products @stop
@section('header_content') This is some content for this section about our products. This is some content for this section about our products.  @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert-block">{{ Session::get('message') }}</div>
    @endif


    @foreach($productcategory as $key => $value)

    @if ( $key%4 == 0)
        <div class="row">
    @endif

    <div class="col-sm-6 col-md-3">
    <div class="product-thumbnail thumbnail">
        @foreach($value->files as $k => $file)

                @if ($value->default_image == $file->id)

                    <img src="{{ URL::to('/') }}/{{ Config::get('uploads.square') }}/{{ $file->file_name }}" alt="">

                @endif

               @endforeach
      <div class="caption">
        <h3>{{ $value->title }}</h3>
        <p>{{ $value->short_description }}</p>
        <p><a href="{{ URL::to('products/' . $value->id) }}" class="btn btn-default" role="button">View Products</a></p>
      </div>
    </div>
  </div>

  @if ( ($key+1)%4 == 0)
                                </div>
                            @else
                                @if( ($key+1) == $productcategory->count() )
                                    </div>
                                @endif
                            @endif

    @endforeach
</div>

@stop