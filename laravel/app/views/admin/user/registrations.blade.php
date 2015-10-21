@extends('admin.layouts.admin')

@section('title') Registrations @stop

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Serial</th>
            <th></th>
        </tr>


        @foreach($users as $key => $value)
        <tr>
                <td><?php $date = $value->created_at; echo date('m-d-y g:i a',strtotime($date)); ?></td>
                <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    <?php $serial = $value->serials->first(); ?>
                    {{ $serial['serial'] }}
                </td>
                <td class="text-right">
                    <a class="btn btn-primary" href="{{ URL::to('admin/users/' . $value->id) }}">View</a>
<!--                     <a class="btn btn-danger" href="{{ URL::to('admin/users/' . $value->id) .'/delete'}}">Delete</a>
 -->                </td>
        </tr>
        @endforeach

        </table>

        {{ $users->links() }}
    </div>

@stop