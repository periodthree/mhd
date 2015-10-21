@extends('admin.layouts.admin')

@section('title') Update Product @stop

@section('content')


    @if ($errors->has())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif


    {{ Form::model($productcategory, array('route' => array('admin.products.update', $productcategory->id), 'method' => 'PUT', 'files' => true)) }}


  <div class="panel panel-default">





        <div class="panel-body">

            <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <div class="checkbox">
                                <label>
                                {{ Form::checkbox('product_active', 1, null,array('id' => 'product_active') ) }}
                                Active?
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            {{ Form::label('parent_category', 'Parent Category') }}
                            {{ Form::select('parent_category', $productcategories, $productcategory->parent_category,  array('class' => 'form-control') ) }}


                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('business_name')) has-error @endif">

                            {{ Form::label('title', 'Title') }} <span class="text-danger">*</span>
                            {{ Form::text('title', null, array('class' => 'form-control')) }}
                            @if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('short_description')) has-error @endif">



                            {{ Form::label('short_description', 'Short Description') }}
                            {{ Form::text('short_description', null, array('class' => 'form-control')) }}
                            @if ($errors->has('short_description')) <p class="help-block">{{ $errors->first('short_description') }}</p> @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('long_description')) has-error @endif">

                            {{ Form::label('long_description', 'Long Description') }}
                            {{ Form::textarea('long_description', null, array('class' => 'form-control wysiwyg')) }}
                            @if ($errors->has('long_description')) <p class="help-block">{{ $errors->first('long_description') }}</p> @endif

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('long_description')) has-error @endif">

                            {{ Form::label('product_features', 'Product Features') }}
                            {{ Form::textarea('product_features', null, array('class' => 'form-control wysiwyg')) }}
                            @if ($errors->has('product_features')) <p class="help-block">{{ $errors->first('product_features') }}</p> @endif

                        </div>
                    </div>
                </div>





        </div>



    </div>

<!--
    <div class="panel panel-default">
      <div class="panel-heading">
            <h3 class="panel-title">Warranty</h3>
        </div>

        <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('warranty_icon')) has-error @endif">

                            {{ Form::label('warranty_icon', 'Warranty Icon') }}
                            {{ Form::file('warranty_icon', null, array('class' => 'form-control')) }}
                            @if ($errors->has('warranty_icon')) <p class="help-block">{{ $errors->first('warranty_icon') }}</p> @endif

                        </div>
                    </div>

                     <div class="col-md-6">
                        <div class="form-group @if ($errors->has('warranty_pdf')) has-error @endif">

                            @if ($productcategory->warranty_pdf)
                            <p>
                                Uploaded File: <a href="{{ asset( Config::get('uploads.warranty_pdf')."/".$productcategory->warranty_pdf) }}">Download Warranty PDF</a> | <a class="text-danger" href="#">Delete File</a>
                            </p>

                            @endif

                            {{ Form::label('warranty_pdf', 'Warranty PDF') }}
                            {{ Form::file('warranty_pdf', null, array('class' => 'form-control')) }}
                            @if ($errors->has('warranty_pdf')) <p class="help-block">{{ $errors->first('warranty_pdf') }}</p> @endif

                            @if ( !$errors->has('warranty_pdf') && $productcategory->warranty_pdf )



                            @endif

                        </div>
                    </div>
                </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Brochure</h3>
                    </div>

                    <div class="panel-body">

                                    <div class="form-group @if ($errors->has('brochure_pdf')) has-error @endif">

                                        {{ Form::label('brochure_pdf', 'Brochure PDF') }}
                                        {{ Form::file('brochure_pdf', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('brochure_pdf')) <p class="help-block">{{ $errors->first('brochure_pdf') }}</p> @endif

                                    </div>



                    </div>

                </div>


        </div>


            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Category Image</h3>
                    </div>

                    <div class="panel-body">

                                    <div class="form-group @if ($errors->has('category_image')) has-error @endif">

                                        {{ Form::label('category_image', 'Category Product Image') }}
                                        {{ Form::file('category_image', null, array('class' => 'form-control')) }}
                                        @if ($errors->has('category_image')) <p class="help-block">{{ $errors->first('category_image') }}</p> @endif

                                    </div>



                    </div>

                </div>


        </div>
    </div>


 -->

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop