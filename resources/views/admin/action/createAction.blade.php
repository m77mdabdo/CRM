@extends('admin.layout')

@section('body')

<div class="container mt-4">
    <h2>Create New Action</h2>

    <form action="{{ route('storeAction') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="customer_id" class="form-label">Select Customer</label>
            <select name="customer_id" id="customer_id" class="form-select" required>
                <option value="">-- Select Customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->email }})
                    </option>
                @endforeach
            </select>
            @error('customer_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Select Employee</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Select Employee --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="action_type" class="form-label">Action Type</label>
            <select name="action_type" id="action_type" class="form-select" required>
                <option value="">-- Select Action Type --</option>
                <option value="call" {{ old('action_type') == 'call' ? 'selected' : '' }}>Call</option>
                <option value="visit" {{ old('action_type') == 'visit' ? 'selected' : '' }}>Visit</option>
                <option value="follow_up" {{ old('action_type') == 'follow_up' ? 'selected' : '' }}>Follow Up</option>
            </select>
            @error('action_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="action_date" class="form-label">Action Date & Time</label>
            <input type="datetime-local" name="action_date" id="action_date" class="form-control" value="{{ old('action_date') }}" required>
            @error('action_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('allAction') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
