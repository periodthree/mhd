@extends('layouts.master')


@section('content')

    <div class="content-large">


        <p><em><strong>Dear South Carolinians</strong></em>,</p>

<p>myHVACdiscount.com has been formed by <a href="http://creggercompany.com">Cregger Company Inc</a> in order to provide HVAC replacement assistance to the citizens of South Carolina as we recover from the massive flooding that has done so much damage to our beautiful state.</p>
<p><img class="media-alignleft" src="{{ asset('assets/img/goodman-unit-1.jpg') }}" alt="Goodman Unit">If you have property in the state of SC that needs to have its air conditioning system replaced, you are eligible for this discount.  With the help of our partners and installing contractors, Cregger Company is able to offer discount payments averaging between $500 and $1000 to property owners with potential discount earnings of up to several thousand dollars (depending on the installation). These discounts apply to newly installed <a href="http://goodmanmfg.com">Goodman</a> and <a href="http://mcclureair.com">McClure</a> HVAC equipment.</p>
<p><img class="media-alignright" src="{{ asset('assets/img/mcclure-unit-1.jpg') }}" alt="McClure Air Unit">In order to qualify and receive this substantial discount check from Cregger Company, make sure you use an approved installer.  To get more information or schedule a visit for your free estimate, <a href="#" class="purechat-button-expand">start a chat</a> with us right now.  Or, reach out to one of our <a href="{{ url('installers') }}">approved installers</a> directly and schedule an appointment.
For more details on this program, please visit the <a href="{{ url('how-it-works') }}">How It Works</a> page.</p>


    </div>
@stop

@section('sidebar')
    @include('inc.sidebar')

    <div class="sidebar-logos">
        <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/goodman-logo-opt.png') }}" alt="Goodman Air Conditioning &amp; Heating">
        </p>
         <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/McClure-logo-opt.png') }}" alt="McClure Air">
        </p>
        <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/QuietFlex-logo-opt.png') }}" alt="Quietflex">
        </p>
        <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/Certainteed-logo-opt.png') }}" alt="Certainteed">
        </p>
        <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/royal-metals-logo-opt.png') }}" alt="Royal Metal Products">
        </p>
        <p>
            <img class="center-block img-responsive" src="{{ asset('assets/img/Lukjan-logo-opt.png') }}" alt="Lukjan Metal Products">
        </p>

    </div>

@stop