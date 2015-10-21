@extends('layouts.master')

@section('title') Login @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    @if ($errors->has())
    <div class="alert alert-danger" role="alert">

            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

    </div>
    @endif

    {{ Form::open(array('action' => 'UserController@doLogin')) }}

    <div class="form-group">
        <label for="email">Username <span class="text-danger">*</span></label>
        <input id="email" class="form-control" type="text" name="username" value="{{ Input::old('username') }}">
    </div>

    <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input id="password" class="form-control" type="password" name="password" value="">
    </div>

    <div class="form-group">
        <span class="pull-right"><a href="{{ URL::to('password') }}">Forgot Password?</a></span>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop