@extends('admin.layouts.admin')

@section('title') Models for {{ $productcategory->title }} @stop

@section('content')




<div class="row">



<div class="col-md-9">

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif

    <div class="panel panel-default">


        <table class="table">
            <tr>
                <th>Model ID</th>
                <th></th>
            </tr>
            @foreach ($models as $model)
            {{ Form::open(array('url' => 'admin/products/deletemodel/' .$model->id .'/' , 'class' => 'form-inline')) }}
            <input type="hidden" name="product_category_id" value="{{ $productcategory->id }}">
                <tr>
                    <td>{{ $model->model_id }}</td>
                    <td>

                        {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete pull-right')) }}
                    </td>
                </tr>
                {{ Form::close() }}
            @endforeach
        </table>

    </div>

</div>

<div class="col-md-3">

     @if ($errors->has())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif

        {{ Form::open(array('url' => 'admin/products/' .$productcategory->id .'/addmodels')) }}
            <input type="hidden" name="id" value="{{ $productcategory->id }}">


                <div class="form-group">
                        {{ Form::label('models', 'Add Models') }} <span class="text-danger">*</span>
                        {{ Form::textarea('models', Input::old('models'),  array('class' => 'form-control') ) }}
                        @if ($errors->has('models')) <p class="help-block">{{ $errors->first('models') }}</p> @endif
                        <p class="help-block">Separate Model #'s by commas, e.g. 12345,23456,34567,etc...</p>

                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>

            {{ Form::close() }}

</div>

<!-- <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                {{ Form::open(array('url' => 'admin/products/addmodels', 'method' => 'POST', 'files' => true)) }}
                <input type="hidden" name="product_category_id" value="{{ $productcategory->id }}">
                    <div class="form-group">
                        <label for="models">Upload Models CSV</label>
                        <input type="file" id="models" name="models">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload File</button>

                {{ Form::close() }}
            </div>
        </div>
    </div>

</div> -->




@stop