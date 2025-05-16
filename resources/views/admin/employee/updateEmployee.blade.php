@extends('admin.layout')

@section('body')

@extends('admin.layout')

@section('body')



    <div class="container">
        <h2>update Employee</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateEmployee',$employee->id) }}" method="POST">
            @csrf

            @method('put')
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name"  class="form-control" required value="{{ $employee->name}}">
            </div>

            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required value="{{ $employee->email}}">
            </div>

            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required value="{{ $employee->password}}" >
            </div>

            <div class="mb-3">
                <label>Role:</label>
                <select name="role" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <select name="customers_id[]" multiple class="form-select">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ in_array($customer->id, old('customers_id', $employee->customers->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">update</button>
            <a href="{{ route('allEmployee') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection



@endsection
