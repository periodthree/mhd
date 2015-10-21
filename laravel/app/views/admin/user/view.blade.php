@extends('admin.layouts.admin')

@section('title') User @stop

@section('content')


    @if ($errors->has())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif


    <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Serial(s)</h3>
          </div>


            <ul class="list-group">
              @foreach ($serials as $serial)
              <li class="list-group-item">{{ $serial->serial }}</li>
              @endforeach
            </ul>


        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Contact</h3>
          </div>

          <ul class="list-group">

              <li class="list-group-item">Username: <strong>{{ $user->username ? $user->username : 'N/A' }}</strong></li>
              <li class="list-group-item">Name: <strong>{{ $user->first_name }} {{ $user->last_name }}</strong></li>
              <li class="list-group-item">Email: <strong>{{ $user->email }}</strong></li>
              <li class="list-group-item">Phone: <strong>{{ $user->phone }}</strong></li>
              <li class="list-group-item">Address: <strong>{{ $user->address }}{{ $user->address_2 ? ' '.$user->address_2 : '' }}, {{ $user->city }}, {{ $user->state }} {{ $user->zip }}</strong></li>
            <li class="list-group-item">Comments: <strong>{{ $user->comments }}</strong></li>
            </ul>
        </div>







@stop