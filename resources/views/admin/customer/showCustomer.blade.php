
@extends('admin.layout')
    @section('body')


    <h2>Customer Details</h2>

    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>Email:</strong> {{ $customer->email }}</p>
    <p><strong>phone:</strong> {{ $customer->phone }}</p>

    <h4>Employee:</h4>
    <ul>
        @forelse ($customer->users as $user)
            <li>{{ $user->name }} - {{ $user->email }}</li>
        @empty
            <li>No  employee.</li>
        @endforelse
    </ul>

    <br>
     <a class="btn btn-info" href="{{ route("editeCustomer",$customer->id) }}">edite</a>
     <a class="btn btn-info" href="{{ route("createAction",$customer->id) }}">Action</a>


     <form action="{{ route("deleteCustomer",$customer->id) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">delete</button>

        </form>

    <br>
    <a href="{{ route('allCustomer') }}" class="btn btn-primary">Back to List </a>

@endsection
