@extends('layouts.master')

@section('title') Thank You @stop
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

     <p>Thank you for registering your product(s).</p>


    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-title">Your Information</div>
        </div>

        <div class="panel-body">
            <p><strong>Name: </strong>{{ $user->first_name }} {{ $user->lastname }}</p>
            <p><strong>Email: </strong>{{ $user->email ? $user->email : 'Not provided' }}</p>
            <p><strong>Phone: </strong>{{ $user->phone ? $user->phone : 'Not provided' }}</p>
            <p><strong>Address: </strong>{{ $user->address }} {{ $user->address2 }}, {{ $user->city }}, {{ $user->state }} {{ $user->zip }} {{ $user->country }}</p>

        </div>

    </div>


@stop