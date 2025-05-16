



@extends('admin.layout')

@section('body')
<div class="container">
    <h2>Edit Customer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('updateCustomer', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{  $customer->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{  $customer->email}}" required>
        </div>

        <div class="mb-3">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" value="{{$customer->phone }}" required>
        </div>

        @if (auth()->user()->role === 'admin')
            <div class="mb-3">
                <label>Employee:</label>
                <select name="user_id[]" multiple class="form-select">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ in_array($employee->id, $customer->users->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
                <small class="text-muted">Hold Ctrl (Windows) or Cmd (Mac) to select multiple</small>
            </div>
        @endif

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('allCustomer') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

