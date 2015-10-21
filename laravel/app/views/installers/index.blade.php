@extends('layouts.master')

@section('title') Installers @stop

@section('sidebar')


    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Installer Search</h3>
      </div>
      <div class="panel-body">
        <form method="get" class="form-inline" action="{{ URL::to('/installers/') }}">
              <div class="form-group @if ($errors->has()) has-error @endif">
                <label class="sr-only" for="zip">Enter Your Zip Code</label>
                <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter Your Zip Code">
              </div>

              <button type="submit" class="btn btn-primary">Find An Installer</button>

            </form>
      </div>
    </div>


@stop



@section('content')

    @if (Session::has('message'))
        <div class="alert-block">{{ Session::get('message') }}</div>
    @endif


    @if (sizeof($installers) > 0)
    <div class="list-group">
        @foreach ($installers as $installer)
          <div href="#" class="list-group-item installer-listitem" itemscope itemtype="http://schema.org/HVACBusiness">
            <div class="row">

                <div class="col-md-8">
                <h3 class="list-group-item-heading installer-listitem-title" itemprop="name">{{{ $installer->business_name }}}</h3>

                <div class="installer-listitem-address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

                    <p itemprop="address">
                        <span itemprop="streetAddress">{{{ $installer->address }}}{{{ $installer->address_2 ? ' '.$installer->address_2 : '' }}}</span>,
                        <span itemprop="addressLocality">{{{ $installer->city }}}</span>,
                        <span itemprop="addressRegion">{{{ $installer->state }}}</span>
                        <span itemprop="postalCode">{{{ $installer->zip }}}</span>

                    </p>

                </div>

                <!-- <p class="list-group-item-text">{{{ $installer->zipcodes_served }}}</p> -->


                @foreach ($installer->services->lists('service_name') as $service)
                    <span class="installer-service"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> {{{ $service }}}</span>
                @endforeach

                </div>

                <div class="col-md-4">
                    <div class="installer-listitem-contact">
                        @if ($installer->phone) <a class="btn btn-primary" href="tel:{{{ $installer->phone }}}" itemprop="telephone">{{{ $installer->phone }}}</a> @endif
                        @if ($installer->email) <a class="btn btn-primary" href="mailto:{{{ $installer->email }}}" itemprop="email">Email</a> @endif
                        @if ($installer->website) <a class="btn btn-primary" href="{{{ $installer->website }}}" itemprop="url">Website</a> @endif
                    </div>
                </div>

            </div>



          </div>
        @endforeach

    </div>
    @else

        <p>We couldn't find any installers for <strong>{{{ $_GET['zip'] }}}</strong></p>

    @endif




@stop