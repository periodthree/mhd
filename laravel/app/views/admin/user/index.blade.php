@extends('admin.layouts.admin')

@section('title') Users @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success alert-block">{{ Session::get('message') }}</div>
    @endif
    <div class="table-responsive">
   <table class="table table-striped">
    <tr>
        <th>Name (Username)</th>
        <th>Email</th>
        <th>Admin Level</th>
        <th></th>
    </tr>


    @foreach($users as $key => $value)
    <tr>
            <td>{{ $value->first_name }} {{ $value->last_name }} ({{ $value->username }})</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->admin_level }}</td>
            <td class="text-right">
                {{ Form::open(array('url' => 'admin/users/' . $value->id, 'class' => 'form-inline')) }}
                <a class="btn btn-primary" href="{{ URL::to('admin/users/' . $value->id.'/edit') }}">Edit</a>


                 {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-delete')) }}
                {{ Form::close() }}
            </td>
    </tr>
    @endforeach

    </table>
    </div>

@stop