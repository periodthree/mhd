@include('inc.html_head')
@include('inc.head')
<div class="wrapper page-wrapper landing-wrapper {{ Request::segment(1) }}-wrapper">

    <div class="container landing-container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="landing-header">
                    <h2>@yield('title')</h2>

                    <div class="landing-header-content">
                        @yield('header_content')
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container landing-container">
        <div class="landing-content">
            @yield('content')
        </div>
    </div>

</div>

@include('inc.footer')
@include('inc.html_footer')

