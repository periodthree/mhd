@extends('layouts.master')

@section('title') Claim your HVAC Flood Relief Discount @stop

@section('content')

    <div class="panel">
        <div class="panel-body">
            <p>Fill out and submit the below form to get your Flood Relief Discount Check. Be sure to enter the serial number accurately for each piece of Goodman or McClure equipment installed in your home.</p>
        </div>
    </div>

    @if ($errors->has())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif

    {{ Form::open(array('action' => 'UserController@store')) }}

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Serial Numbers</h3>
        </div>


        <div class="panel-body serials">

            <div class="serial form-group @if ($errors->has('unit_1')) has-error @endif">
               <div class="row">
                   <div class="col-md-4"><label for="unit_1">Unit #1 <span class="text-danger">*</span></label></div>
                   <div class="col-md-8">
                        <input id="unit_1" class="form-control serial_input" type="text" name="unit[]" value="{{ Input::old('unit_1') }}" placeholder="10 Digit Serial e.g. 1000000000">
                        @if ($errors->has('unit_1')) <p class="help-block">{{ $errors->first('unit_1') }}</p> @endif
                    </div>
                </div>

                <div class="row"><div id="unit_1_model" class="col-md-12 col-md-offset-4 unit"></div></div>
            </div>



            <?php

                $numunits = Input::old('numunits');

                if( $numunits ) {
                    $numDivs = Input::old('numunits')-1;
                } else {
                    $numDivs = 2;
                }


                for($i=2;$i<=($numDivs+1);$i++) {
            ?>

            <div class="serial form-group @if ($errors->has('unit_{{ $i }}')) has-error @endif">
                <div class="row">
                    <div class="col-md-4"><label for="unit_{{ $i }}">Unit #{{ $i }} </label></div>
                    <div class="col-md-8"><input id="unit_{{ $i }}" class="form-control serial_input" type="text" name="unit[]" value="{{ Input::old('unit_'.$i) }}" placeholder="10 Digit Serial e.g. 1000000000"></div>
                </div>
                 <div class="row"><div id="unit_{{ $i }}_model" class="col-md-12 col-md-offset-4 unit"></div></div>
            </div>



            <?php }; ?>

            <a class="btn btn-default add-serial" href="#">+ Add More Serials</a>


        </div>

    </div>

    @include('inc.unit_template')

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Installer</h3>
        </div>

        <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('installer_id')) has-error @endif">
                            <label for="installer_id">Installer <span class="text-danger">*</span></label>

                            {{ Form::select('installer_id',$installers, Input::old('installer_id'), array('id'=>'territory', 'class' => 'form-control') ) }}

                            @if ($errors->has('installer_id')) <p class="help-block">{{ $errors->first('installer_id') }}</p> @endif

                        </div>
                    </div>
            </div>
        </div>

    </div>


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
                    <div class="col-md-8">
                        <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" class="form-control" type="text" name="email" value="{{ Input::old('email') }}">
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{ Input::old('phone') }}">
                        </div>
                    </div>

                </div>
        </div>
    </div>


    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Address</h3>
        </div>


        <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group @if ($errors->has('address')) has-error @endif">
                            <label for="address">Address<span class="text-danger">*</span></label>
                            <input id="address" class="form-control" type="text" name="address" value="{{ Input::old('address') }}">
                             @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address_2">Address 2</label>
                            <input id="address_2" class="form-control" type="text" name="address_2" value="{{ Input::old('address_2') }}">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                            <label for="city">City <span class="text-danger">*</span></label>
                            <input id="city" class="form-control" type="text" name="city" value="{{ Input::old('city') }}">
                             @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group @if ($errors->has('state')) has-error @endif">
                            <label for="state">State <span class="text-danger">*</span></label>
                            {{ Form::stateSelect('state', Input::old('state'), array('id'=>'state', 'class' => 'form-control') ) }}
                             @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif
                        </div>
                    </div>

                </div>

                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group @if ($errors->has('zip')) has-error @endif">
                            <label for="zip">Zip <span class="text-danger">*</span></label>
                            <input id="zip" class="form-control" type="text" name="zip" value="{{ Input::old('zip') }}">
                             @if ($errors->has('zip')) <p class="help-block">{{ $errors->first('zip') }}</p> @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="country">Country</label>
                            {{ Form::countrySelect('country', Input::old('country'), array('id'=>'country', 'class' => 'form-control') ) }}
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