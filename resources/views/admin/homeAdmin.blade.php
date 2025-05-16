@extends('admin.layout')

@section('body')

<table class="table">
    <thead>

        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>






        </tr>

    </thead>
    <tbody>
        @foreach ($employees as $employee )


            <tr>
        <td>
        {{ $loop->iteration }}
        </td>
        <td>{{ $employee->name }}</td>
        <td class="text-right"> {{ $employee->email }} </td>
        <td class="text-right"> {{ $employee->role }} </td>





        {{-- <td class="text-right font-weight-medium">
            @foreach($employee->customers as $customer)
                {{ $customer->email }}<br>
            @endforeach
        </td> --}}

         <td>  <a class="nav-link btn w-50 btn-success create-new-button" href="{{ route('showEmployee',$employee->id) }}">Show</a></td>

            </tr>

      @endforeach
    </tbody>
  </table>
  {{ $employees->links() }}

  <a href="{{ route('createEmployee') }}" class="btn btn-success">
    + Create New
   </a>
@endsection
