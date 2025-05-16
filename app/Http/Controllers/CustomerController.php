<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    //all employees
    public function all()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            $customers = Customer::paginate(7);
        } else {

            $customers = $user->customers()->paginate(3);
        }



        return view('admin.customer.homeCustomer', ['customers' => $customers]);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        return view('admin.customer.showCustomer', ['customer' => $customer]);
    }

    public function create()
    {
        $user = Auth::user();

        $employees = [];

        if ($user->role == 'admin') {
            $employees = User::where('role', 'employee')->get();
        } elseif ($user->role === 'employee') {

            $employees[] = $user;
        }

        return view('admin.customer.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
        ]);

        $user = Auth::user();

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->user_id = $user->id;

        $customer->save();


        if ($user->role === 'admin') {
            $employeeIds = $request->input('user_id', []);
        } else {
            $employeeIds = [$user->id];
        }


        if (!empty($employeeIds)) {
            $customer->users()->attach($employeeIds, ['assigned_at' => now()]);
        }

        return redirect()->route('allCustomer')->with('success', 'Customer created successfully.');
    }


    public function edite($id)
    {
        $customer = Customer::with('users')->findOrFail($id);

        $employees = [];

        if (Auth::user()->role === 'admin') {
            $employees = User::where('role', 'employee')->get();
        }

        return view('admin.customer.updateCustomer', compact('customer', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'phone' => 'required|string|max:20',
        ]);

        $customer = Customer::findOrFail($id);

        $user = Auth::user();



        $customer->update($data);

        // $customer->name = $request->name;
        // $customer->email = $request->email;
        // $customer->phone = $request->phone;
        // $customer->save();


        if ($user->role === 'admin') {
            $employeeIds = $request->user_id ?? [];
            $customer->users()->sync($employeeIds);
        }

        session()->flash("success", "Customer updated successfully");
        return redirect()->route('showCustomer', $customer->id);
    }


    public function delete($id)
    {
        $customre = Customer::findOrFail($id);

        $customre->delete();


        session()->flash("success", "data delete  successfuly");


        return  redirect(route('allCustomer'));
    }
}
