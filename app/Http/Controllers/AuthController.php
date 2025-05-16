<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RepositoryInterface\AuthInterface;

class AuthController extends Controller
{
    // conctie repository


    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $data = $request->validate([

            'email' => 'required|email|max:200',
            "password" => "required|string|min:6",

        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();

            session()->flash("success", "Welcome {$user->name}");

            if ($user->role === 'admin') {
                return redirect()->route('allEmployee');
            } elseif ($user->role === 'employee') {

                return redirect()->route('allCustomer');
            } else {
                Auth::logout();
                return redirect()->route('loginForm')->withErrors(['email' => 'Unauthorized role']);
            }
        } else {
            return back()->withErrors([
                'email' => 'Email or password is incorrect.',
            ]);
        }
    }
}
