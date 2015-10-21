@extends('layouts.home')

@section('title') Home @stop

@section('content')

    <div class="container home-container">

        <div class="home-intro">
            <h1 class="logo text-hide">McClure Air</h1>
            <p><a class="btn btn-primary btn-lg" href="{{ URL::to('register') }}">Register Your Product</a></p>
        </div>

        <div class="home-unit-photo">
            <img src="{{asset('assets/img/unit-home.jpg')}}" alt="">
        </div>

    </div>

@stop