@extends('admin.layouts.admin')

@section('title') Update Installer @stop

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


    {{ Form::model($installer, array('route' => array('admin.installers.update', $installer->id), 'method' => 'PUT')) }}


  <div class="panel panel-default">

        <div class="panel-heading">
            <h3 class="panel-title">Business/Contact Information</h3>
        </div>



        <div class="panel-body">



                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('business_name')) has-error @endif">

                            {{ Form::label('business_name', 'Business Name') }} <span class="text-danger">*</span>
                            {{ Form::text('business_name', null, array('class' => 'form-control')) }}
                            @if ($errors->has('business_name')) <p class="help-block">{{ $errors->first('business_name') }}</p> @endif

                        </div>
                    </div>

                <div class="col-md-6">

                        <div class="form-group @if ($errors->has('account_number')) has-error @endif">

                            {{ Form::label('account_number', 'Account Number') }} <span class="text-danger">*</span>
                            {{ Form::text('account_number', null, array('class' => 'form-control')) }}
                            @if ($errors->has('account_number')) <p class="help-block">{{ $errors->first('account_number') }}</p> @endif

                        </div>

                </div>

            </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('first_name')) has-error @endif">
                            {{ Form::label('first_name', 'First Name') }}
                            {{ Form::text('first_name', null, array('class' => 'form-control')) }}

                            @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group @if ($errors->has('last_name')) has-error @endif">

                            {{ Form::label('last_name', 'Last Name') }}
                            {{ Form::text('last_name', null, array('class' => 'form-control')) }}

                            @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                        </div>
                    </div>

                </div>

                <div class="form-group @if ($errors->has('email')) has-error @endif">

                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}

                            @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                        </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone') }}
                            {{ Form::text('phone', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('alt_phone', 'Alternate Phone') }}
                            {{ Form::text('alt_phone', null, array('class' => 'form-control')) }}

                        </div>
                    </div>

                </div>

                 <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                               {{ Form::label('schedule_phone', 'Scheduling Phone') }}
                                {{ Form::text('schedule_phone', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if ($errors->has('website')) has-error @endif">
                                {{ Form::label('website', 'Website') }}
                                {{ Form::text('website', null, array('class' => 'form-control')) }}
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

                            {{ Form::label('address', 'Address') }} <span class="text-danger">*</span>
                            {{ Form::text('address', null, array('class' => 'form-control')) }}

                             @if ($errors->has('address')) <p class="help-block">{{ $errors->first('address') }}</p> @endif
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('address_2', 'Address 2') }}
                            {{ Form::text('address_2', null, array('class' => 'form-control')) }}
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group @if ($errors->has('city')) has-error @endif">
                            {{ Form::label('city', 'City') }} <span class="text-danger">*</span>
                            {{ Form::text('city', null, array('class' => 'form-control')) }}
                             @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group @if ($errors->has('state')) has-error @endif">
                            <label for="state">State <span class="text-danger">*</span></label>
                             {{ Form::stateSelect('state', null, array('id'=>'state', 'class' => 'form-control') ) }}
                             @if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif
                        </div>
                    </div>

                </div>

                 <div class="row">
                    <div class="col-md-4">
                        <div class="form-group @if ($errors->has('zip')) has-error @endif">
                            {{ Form::label('zip', 'Zip') }} <span class="text-danger">*</span>
                            {{ Form::text('zip', null, array('class' => 'form-control')) }}
                             @if ($errors->has('zip')) <p class="help-block">{{ $errors->first('zip') }}</p> @endif
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="country">Country</label>
                            {{ Form::countrySelect('country', null , array('id'=>'country', 'class' => 'form-control') ) }}
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
                                ), null, array('id'=>'territory', 'class' => 'form-control') ) }}
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
                            <input name="services[]" type="checkbox" value="{{ $service->id }}" @if ( in_array( $service->id,$related_services) ) checked @endif >
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
                            {{ Form::textarea('zipcodes_served', null, array('class' => 'form-control', 'rows' => '5')) }}
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