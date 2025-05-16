@extends('admin.layout')

@section('body')

<table class="table">
    <thead>

        <tr>
            <th>id</th>
            <th>naem</th>
            <th>email</th>
            <th>phone</th>






        </tr>

    </thead>
    <tbody>
        @foreach ($customers as $customer )


            <tr>
        <td>
        {{ $loop->iteration }}
        </td>
        <td>{{ $customer->name }}</td>
        <td class="text-right"> {{ $customer->email }} </td>
        <td class="text-right"> {{ $customer->phone }} </td>







         <td>  <a class="nav-link btn w-50 btn-success create-new-button" href="{{ route('showCustomer',$customer->id) }}">Show</a></td>

            </tr>

      @endforeach
    </tbody>
  </table>
  {{ $customers->links() }}

  <a href="{{ route('createCustomer') }}" class="btn btn-success">
    + Create New
   </a>
@endsection
