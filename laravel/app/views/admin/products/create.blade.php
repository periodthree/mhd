@extends('admin.layouts.admin')

@section('title') Add New Product @stop

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


 {{ Form::open(array('url' => 'admin/products/store')) }}

  <div class="panel panel-default">





        <div class="panel-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('product_active', 1, Input::old('product_active'),array('id' => 'product_active') ) }}

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
                            {{ Form::select('parent_category', $productcategories, Input::old('parent_category'),  array('class' => 'form-control') ) }}


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



                            {{ Form::label('short_description', 'Subtitle/Short Description') }}
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


    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop