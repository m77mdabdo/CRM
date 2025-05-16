@extends('admin.layout')

@section('body')

<div class="container mt-4">
    <h2 class="mb-4">Action Details</h2>
 @csrf
    <div class="card p-4">
        <div class="mb-3">
            <strong>Customer Name:</strong>
            {{ $action->customer->name ?? 'N/A' }}
        </div>

        <div class="mb-3">
            <strong>Customer Email:</strong>
            {{ $action->customer->email ?? 'N/A' }}
        </div>

        <div class="mb-3">
            <strong>Handled By (User):</strong>
            {{ $action->employee->name ?? 'N/A' }}
        </div>

        <div class="mb-3">
            <strong>Action Type:</strong>
            {{ ucfirst(str_replace('_', ' ', $action->action_type)) }}
        </div>

        <div class="mb-3">
            <strong>Action Date:</strong>
            {{ \Carbon\Carbon::parse($action->action_date)->format('Y-m-d H:i') }}
        </div>

        <br>
     <a class="btn btn-info" href="{{ route("editAction",$action->id) }}">edite</a>


     <form action="{{ route("deleteAction",$action->id) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger">delete</button>

        </form>

    <br>
    <a href="{{ route('allCustomer') }}" class="btn btn-primary">Back to List </a>

        <a href="{{ route('allAction') }}" class="btn btn-secondary">← Back to Actions</a>
    </div>
</div>

@endsection
