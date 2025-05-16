{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Employee</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head> --}}
{{-- <body> --}}
@extends('admin.layout')
    @section('body')


    <h2>Employee Details</h2>

    <p><strong>Name:</strong> {{ $employee->name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Role:</strong> {{ $employee->role }}</p>

    <h4>Assigned Customers:</h4>
    <ul>
        @forelse ($employee->customers as $customer)
            <li>{{ $customer->name }} - {{ $customer->email }}</li>
        @empty
            <li>No customers assigned to this employee.</li>
        @endforelse
    </ul>

    <br>
     <a class="btn btn-info" href="{{ route("editeEmployee",$employee->id) }}">edite</a>
     <a class="btn btn-info" href="{{ route("createAction",$employee->id) }}">Action</a>


     <form action="{{ route("deleteEmployee",$employee->id) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">delete</button>

        </form>

    <br>
    <a href="{{ route('allEmployee') }}" class="btn btn-primary">Back to List </a>

@endsection

{{-- </body>
</html> --}}




