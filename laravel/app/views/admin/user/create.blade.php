@extends('admin.layouts.admin')

@section('title') User @stop

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

    {{ Form::open(array('action' => 'AdminUserController@store')) }}


    <div class="form-group">
        <label for="first_name">Username <span class="text-danger">*</span></label>
        <input id="first_name" class="form-control" type="text" name="username" value="{{ Input::old('username') }}">
    </div>

    <div class="form-group">
        <label for="first_name">First Name <span class="text-danger">*</span></label>
        <input id="first_name" class="form-control" type="text" name="first_name" value="{{ Input::old('first_name') }}">
    </div>

    <div class="form-group">
        <label for="last_name">Last Name <span class="text-danger">*</span></label>
        <input id="last_name" class="form-control" type="text" name="last_name" value="{{ Input::old('last_name') }}">
    </div>

    <div class="form-group">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input id="email" class="form-control" type="text" name="email" value="{{ Input::old('email') }}">
    </div>

    <div class="form-group">
        <label for="password">Password <span class="text-danger">*</span></label>
        <input id="password" class="form-control" type="password" name="password" value="">
    </div>

    <div class="form-group">
        <label for="admin_level">Administrator Level <span class="text-danger">*</span></label>

        <select class="form-control" name="admin_level">
            <option value=""></option>
            <option value="Administrator">Administrator</option>
            <option value="User">User</option>
            <option value="Registrant">Registrant</option>
        </select>

    </div>




    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop