<nav class="navbar navbar-inverse navbar-admin" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand text-hide" href="{{ URL::to('/') }}">{{ Config::get('site.name') }} Administration</a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/registrations') }}">Registrations</a></li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ URL::to('admin/users') }}">View All Users</a></li>
                <li><a href="{{ URL::to('admin/users/create') }}">Add New User</a></li>

              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Installers <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ URL::to('admin/installers') }}">View All Installers</a></li>
                <li><a href="{{ URL::to('admin/installers/create') }}">Add New Installer</a></li>

              </ul>
            </li>
            {{-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Products <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ URL::to('admin/products') }}">View All Products</a></li>
                <li><a href="{{ URL::to('admin/products/create') }}">Add New Product</a></li>
              </ul>
            </li> --}}

            <!-- <li><a href="{{ URL::to('admin/products') }}">Products</a></li>
            <li><a href="{{ URL::to('admin/installers') }}">Installers</a></li> -->
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="{{ URL::to('/') }}">Back to Site</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div><!-- /.navbar-collapse -->

    </div><!-- /.container-fluid -->
</nav>



