<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('user-access:admin');
    }

    public function adminDashboard()
    {
        $appointments = Appointment::where('status', 0)->get();
        $visits = Visit::where('status', 1)->get();
        return view('admin.dashboard', compact('appointments', 'visits'));
    }

    public function addUser()
    {
        return view('user.register');
    }

    public function storeUser(Request $request)
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        User::create($input);
        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'New User Created!');
    }

}
