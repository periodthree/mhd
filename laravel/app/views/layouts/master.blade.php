@include('inc.html_head')
@include('inc.head')
<div class="wrapper page-wrapper">

    <div class="container">
        <div class="page-header">
            <h2>@yield('title')</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">


            <div class="col-xs-12 col-sm-6 col-md-8">
                @yield('content')
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">@yield('sidebar')</div>

        </div>
    </div>

</div>

@include('inc.footer')
@include('inc.html_footer')

