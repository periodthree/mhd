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

    {{ Form::open(array('method'=>'put','action' => 'AdminUserController@update')) }}

    <input type="hidden" name="id" value="{{ $user->id }}">

    <div class="form-group">
        <label for="first_name">Username <span class="text-danger">*</span></label>
        <input id="first_name" class="form-control" type="text" name="username" value="@if (Input::old('username')){{ Input::old('username') }}@else{{ $user->username }}@endif">
    </div>

    <div class="form-group">
        <label for="first_name">First Name <span class="text-danger">*</span></label>
        <input id="first_name" class="form-control" type="text" name="first_name" value="@if (Input::old('first_name')){{ Input::old('first_name') }}@else{{ $user->first_name }}@endif">

    </div>

    <div class="form-group">
        <label for="last_name">Last Name <span class="text-danger">*</span></label>
        <input id="last_name" class="form-control" type="text" name="last_name" value="@if (Input::old('last_name')){{ Input::old('last_name') }}@else{{ $user->last_name }}@endif">
    </div>

    <div class="form-group">
        <label for="email">Email <span class="text-danger">*</span></label>
        <input id="email" class="form-control" type="text" name="email" value="@if (Input::old('email')){{ Input::old('email') }}@else{{ $user->email }}@endif">
    </div>

    <div class="form-group">
        <label for="password">Password <span class="text-danger"></span></label>
        <input id="password" class="form-control" type="password" name="password" value="">
    </div>

    <div class="form-group">
        <label for="admin_level">Administrator Level <span class="text-danger">*</span></label>

        <select class="form-control" name="admin_level">
            <option value=""></option>
            <option value="Administrator"@if (Input::old('admin_level') == "Administrator") selected @elseif ($user->admin_level == "Administrator") selected @endif>Administrator</option>
            <option value="User"@if (Input::old('admin_level') == "User") selected @elseif ($user->admin_level == "User") selected @endif>User</option>
            <option value="Registrant"@if (Input::old('admin_level') == "Registrant") selected @elseif ($user->admin_level == "Registrant") selected @endif>Registrant</option>
        </select>

    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop