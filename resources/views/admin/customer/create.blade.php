@extends('admin.layout')

@section('body')
    <div class="container">
        <h2>Create New Customer</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('storeCustomer') }}" method="POST">
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
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

            @if (Auth::user()->role === 'admin')
                <div class="mb-3">
                    <label>Assign To Employee:</label>
                    <select name="user_id[]" multiple class="form-select">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple</small>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('allCustomer') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
