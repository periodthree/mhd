@extends('admin.layouts.admin')

@section('title') Installers Admin @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif


    <div class="table-responsive">
   <table class="table table-striped">
    <tr>
        <th>Business Name</th>
        <th>Account Number</th>
        <th>Address</th>
        <th>Phone</th>
        <th></th>
    </tr>


    @foreach($installers as $key => $value)
    <tr>
            <td>{{ $value->business_name }}</td>
            <td>{{ $value->account_number }}</td>
            <td>{{ $value->address }}, {{ $value->city }} {{ $value->state }} {{ $value->zip }}</td>
            <td>{{ $value->phone }}</td>
            <td class="text-right">
                {{ Form::open(array('url' => 'admin/installers/' . $value->id , 'class' => 'form-inline')) }}

                <a class="btn btn-primary" href="{{ URL::to('admin/installers/' . $value->id.'/edit') }}">Edit</a>

                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete')) }}
                {{ Form::close() }}

            </td>
    </tr>
    @endforeach

    </table>
    </div>

@stop