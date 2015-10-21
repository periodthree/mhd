@include('admin.inc.html_head')
@include('admin.inc.head')
<div class="wrapper  page-wrapper">
<div class="container">
    <div class="page-header">
      <h2>@yield('title')</h2>
    </div>
</div>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{ URL::to('/' . Request::segment(1))}}">Home</a></li>
        <li><a href="{{ URL::to('/' . Request::segment(1) .'/' .Request::segment(2))}}">{{ ucfirst(Request::segment(2)) }}</a></li>
    </ol>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">@yield('content')</div>
        <!-- <div class="col-xs-6 col-md-4">@include('admin.inc.sidebar')</div> -->
    </div>
</div>
</div>

@include('admin.inc.footer')
@include('admin.inc.html_footer')

