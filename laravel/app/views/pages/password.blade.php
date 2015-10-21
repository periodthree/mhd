@extends('layouts.master')

@section('title') Forgot Password @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

   @if ($errors->has())
    <div class="alert alert-danger" role="alert">

            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

    </div>
    @endif

    {{ Form::open(array('action' => 'UserController@resetPassword')) }}

    <p>Enter your username and we'll reset your password.</p>

    <div class="form-group">
        <label for="username">Username <span class="text-danger">*</span></label>
        <input id="username" class="form-control" type="text" name="username" value="{{ Input::old('username') }}">
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop