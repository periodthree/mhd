<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>@yield('title','Home') | {{ Config::get('site.name') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ HTML::style('http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic') }}
        {{ HTML::style('assets/css/styles.css') }}
        {{ HTML::script('assets/js/modernizr.js') }}
    </head>

    <body>
    @include('inc.icons')