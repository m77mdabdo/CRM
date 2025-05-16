
@extends('admin.layout')

@section('body')



    <div class="container">
        <h2>Create New Employee</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeEmployee') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Role:</label>
                <select name="role" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Assign Customers:</label>
                <select name="customers_id[]" multiple class="form-select" >
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple</small>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('allEmployee') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection

