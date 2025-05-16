<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class UserController extends Controller
{


    //all employees
    public function all()
    {

        // $employees = User::where('role', 'employee')->paginate(3);
        $employees = User::paginate(9);
        return view('admin.homeAdmin', ['employees' => $employees]);
    }

    //one employee
    public function show($id)
    {
        $employee = User::find($id);
        // $customers = Customer::all();
        return view('admin.employee.showEmployee', ['employee' => $employee]);
    }

    //create employee
    public function create()
    {
        $customers = Customer::all();

        return view('admin.employee.create', compact('customers'));
    }

    // store employee
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,employee',
            'customers_id' => 'nullable|array',
            'customers_id.*' => 'numeric|exists:customers,id',
        ]);

        $data['password'] = bcrypt($data['password']);


        $employee = User::create($data);


        if (!empty($request->customers_id)) {
            $employee->customers()->attach($request->customers_id);
        }

        session()->flash("success", "sucsses create employee");
        return redirect(route('allEmployee'));
    }



    //edite employee
    public function edite($id)
    {
        $employee = User::findOrFail($id);
        $customers = Customer::all();
        return view('admin.employee.updateEmployee', compact('employee', 'customers'));
    }


    //update employee
    public function update($id, Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'in:admin,employee',
            'customers_id' => 'nullable|array',
            'customers_id.*' => 'numeric|exists:customers,id',
        ]);


        $employee = User::findOrFail($id);


        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }


        $employee->update($data);


        if (isset($data['customers_id'])) {
            $employee->customers()->sync($data['customers_id']);
        } else {

            $employee->customers()->detach();
        }

        session()->flash("success", "Data updated successfully");
        return redirect(route('showEmployee', $employee->id));
    }








    // delete
    public function delete($id)
    {
        $employee = User::findOrFail($id);

        $employee->delete();

        session()->flash("success", "data delete  successfuly");


        return  redirect(route('allEmployee'));
    }
}
