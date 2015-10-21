@extends('layouts.master')

@section('title') Contact Us @stop

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

         @if (Session::has('message'))
        <div class="alert alert-success alert-block">{{ Session::get('message') }}</div>
    @endif

    {{ Form::open(array('action' => 'ContactController@store')) }}

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Contact Information</h3>
        </div>


        <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                            <input id="first_name" class="form-control" type="text" name="first_name" value="{{ Input::old('first_name') }}">
                            @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('last_name')) has-error @endif">
                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                            <input id="last_name" class="form-control" type="text" name="last_name" value="{{ Input::old('last_name') }}">
                            @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" class="form-control" type="text" name="email" value="{{ Input::old('email') }}">
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                    </div>



                </div>
        </div>
    </div>


    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Do you have any comments or questions?</h3>
        </div>


        <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('comments')) has-error @endif">
                            <textarea rows="5" class="form-control" name="comments">{{ Input::old('comments') }}</textarea>
                             @if ($errors->has('comments')) <p class="help-block">{{ $errors->first('comments') }}</p> @endif
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