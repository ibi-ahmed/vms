<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Visit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     public function addUser()
    {
        return view('user.register');
    }

    public function superDashboard()
    {
        return view('super.dashboard');
    }

    public function adminDashboard()
    {
        $appointments = Appointment::where('status', 0)->get();
        $visits = Visit::where('status', 1)->get();
        return view('admin.dashboard', compact('appointments', 'visits'));
    }
    
    public function staffDashboard()
    {
        return view('staff.dashboard');
    }
    
    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function storeUser(Request $request)
    {
        $input = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        // dd(Auth::user()->type.'.dashboard');
        User::create($input);
        return redirect()->route(Auth::user()->type.'.dashboard')->with('success', 'New User Created!');
    }

}
