<nav class="navbar navbar-inverse" role="navigation">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

            <div class="logo">
                <a class="text-hide" href="{{ URL::to('/') }}">{{ Config::get('site.name') }}</a>
            </div>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">

        {{-- <li @if(Request::path() == 'how-it-works') class="active" @endif ><a href="{{ URL::to('how-it-works') }}">How It Works <span class="sr-only">(current)</span></a></li>

        <li @if(Request::path() == 'installers') class="active" @endif ><a href="{{ URL::to('installers') }}">Installers <span class="sr-only">(current)</span></a></li>

        <li @if(Request::path() == 'discounts-and-amounts') class="active" @endif ><a href="{{ URL::to('discounts-and-amounts') }}">Discounts &amp; Amounts <span class="sr-only">(current)</span></a></li> --}}

        <li @if(Request::path() == 'register') class="active" @endif ><a href="{{ URL::to('register') }}">Claim Your Discount <span class="sr-only">(current)</span></a></li>

        {{-- <li @if(Request::path() == 'chat') class="active" @endif ><a href="#">Chat <span class="sr-only">(current)</span></a></li> --}}


        {{-- <li @if(Request::path() == 'contact') class="active" @endif ><a href="{{ URL::to('contact') }}">Contact Us <span class="sr-only">(current)</span></a></li> --}}


      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

