@extends('admin.layout')

@section('body')

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Phone</th>
           <th> Handled By (User) </th>
            <th>Action Type</th>
            <th>Action Date</th>
            <th>Show Customer</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($actions as $action)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $action->customer->name ?? 'N/A' }}</td>
                <td>{{ $action->customer->email ?? 'N/A' }}</td>
                <td>{{ $action->customer->phone ?? 'N/A' }}</td>
                <td>{{ $action->employee->name ?? 'N/A' }}</td>
                <td>{{ $action->action_type }}</td>
                <td>{{ $action->action_date->format('Y-m-d') }}</td>
                <td>
                    <a class="btn btn-success" href="{{ route('showAction', $action->id) }}">
                        Show
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $actions->links() }}

<a href="{{ route('createAction') }}" class="btn btn-success">
    + Create New Action
</a>

@endsection
