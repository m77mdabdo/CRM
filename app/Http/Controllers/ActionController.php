<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Action;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{

    public function all()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            $actions = Action::with(['customer', 'employee'])->paginate(7);
        } else {

            $actions = $user->actions()->paginate(3);
        }



        return view('admin.action.homeAction', compact('actions'));
    }


    public function show($id)
    {
        $action = Action::with(['customer', 'employee'])->findOrFail($id);
        return view('admin.action.showAction', compact('action'));
    }


    public function create()
    {
        $customers = Customer::all();
        $users = User::all();
        return view('admin.action.createAction', compact('customers', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'action_type' => 'required|in:call,visit,follow_up',
            'action_date' => 'required|date',
        ]);

        $action = new Action();
        $action->customer_id = $request->customer_id;
        $action->user_id = Auth::id();
        $action->action_type = $request->action_type;
        $action->action_date = $request->action_date;
        $action->save();

        return redirect()->route('allAction')->with('success', 'Action created successfully.');
    }

    public function edit($id)
    {
        $action = Action::findOrFail($id);
        $customers = Customer::all();
        $users = User::all();
        return view('admin.action.updateAction', compact('action', 'customers', 'users'));
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'user_id' => 'required|exists:users,id',
            'action_type' => 'required|in:call,visit,follow_up',
            'action_date' => 'required|date',
        ]);

        $action = Action::findOrFail($id);
        $action->customer_id = $request->customer_id;
        $action->user_id = $request->user_id;
        $action->action_type = $request->action_type;
        $action->action_date = $request->action_date;
        $action->save();

        return redirect()->route('allAction')->with('success', 'Action updated successfully.');
    }


    public function delete($id)
    {
        $action = Action::findOrFail($id);
        $action->delete();

        return redirect()->route('allAction')->with('success', 'Action deleted successfully.');
    }
}
