@extends('admin.layouts.admin')

@section('title') Add New Installer @stop

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

    {{ Form::open(array('url' => 'admin/installers/store')) }}




  <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Business/Contact Information</h3>
        </div>



        <div class="panel-body">

            <div class="row">
                    <div class="col-md-6">



                <div class="form-group @if ($errors->has('business_name')) has-error @endif">
                            <label for="business_name">Business Name <span class="text-danger">*</span></label>
                            <input id="business_name" class="form-control" type="text" name="business_name" value="{{ Input::old('business_name') }}">
                            @if ($errors->has('business_name')) <p class="help-block">{{ $errors->first('business_name') }}</p> @endif

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('account_number')) has-error @endif">
                            <label for="account_number">Account Number <span class="text-danger">*</span></label>
                            <input id="account_number" class="form-control" type="text" name="account_number" value="{{ Input::old('account_number') }}">
                            @if ($errors->has('account_number')) <p class="help-block">{{ $errors->first('account_number') }}</p> @endif

                        </div>
                    </div>

                </div>

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

                <div class="form-group @if ($errors->has('email')) has-error @endif">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input id="email" class="form-control" type="text" name="email" value="{{ Input::old('email') }}">
                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{ Input::old('phone') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alt_phone">Alternate Phone</label>
                            <input id="alt_phone" class="form-control" type="text" name="alt_phone" value="{{ Input::old('alt_phone') }}">
                        </div>
                    </div>

                </div>

                <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schedule_phone">Scheduling Phone</label>
                                <input id="schedule_phone" class="form-control" type="text" name="schedule_phone" value="{{ Input::old('schedule_phone') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if ($errors->has('website')) has-error @endif">
                            <label for="website">Website</label>
                            <input id="website" class="form-control" type="text" name="website" value="{{ Input::old('website') }}">
                            @if ($errors->has('website')) <p class="help-block">{{ $errors->first('website') }}</p> @endif
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

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @if ($errors->has('territory')) has-error @endif">
                            <label for="territory">Territory</label>
                             @if ($errors->has('territory')) <p class="help-block">{{ $errors->first('territory') }}</p> @endif

                             {{ Form::select('territory',
                                array(
                                    '' => '',
                                    'Columbia' => 'Columbia',
                                    'Charleston' => 'Charleston',
                                    'Myrtle Beach' => 'Myrtle Beach',
                                    'Florence' => 'Florence',
                                ), Input::old('territory'), array('id'=>'territory', 'class' => 'form-control') ) }}
                        </div>
                    </div>


                </div>

        </div>
    </div>

    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Services</h3>
        </div>


        <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($services as $service)
                        <div class="checkbox">
                          <label>
                            @if ( !is_null(Input::old('services')) )

                            <input name="services[]" type="checkbox" value="{{ $service->id }}" @if ( in_array( $service->id,Input::old('services')) ) checked @endif >
                            @else
                            <input name="services[]" type="checkbox" value="{{ $service->id }}">
                            @endif
                                {{{ $service->service_name }}}
                          </label>

                        </div>
                        @endforeach

                    </div>

                </div>

        </div>
    </div>


    <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Zip Codes Served</h3>
        </div>


        <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group @if ($errors->has('zip')) has-error @endif">
                            <label for="zip">Zip Codes</label>
                            <textarea class="form-control" rows="5" name="zipcodes_served">{{ Input::old('zipcodes_served') }}</textarea>
                            <p class="help-block">Separate Zip Codes by commas, e.g. 21000,21010,21090, etc...</p>
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