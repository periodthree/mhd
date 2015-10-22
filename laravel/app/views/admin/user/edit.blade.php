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

    @if(count($user->serials) > 0)

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Rebate Information</h3>
        </div>

        <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rebate_amount">Rebate Amount</label>

                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input id="rebate_amount" class="form-control" type="text" name="rebate_amount" value="@if (Input::old('rebate_amount')){{ Input::old('rebate_amount') }}@else{{ $user->rebate_amount }}@endif">

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('financing')) has-error @endif">
                            <label for="rebate_paid">Rebate Paid?</label>

                                <div>
                                     <label class="checkbox-inline">

                                        @if (Input::old('rebate_paid'))
                                            <input type="checkbox" name="rebate_paid" value="1" checkbox>
                                        @else

                                            <input type="checkbox" name="rebate_paid" value="1" @if($user->rebate_paid) checked @endif >
                                        @endif
                                        Yes
                                    </label>
                                </div>
                        </div>
                    </div>

                </div>

        </div>

    </div>

    @endif

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Contact Information</h3>
        </div>

            <div class="panel-body">

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


        </div>

    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>



    {{ Form::close() }}


@stop