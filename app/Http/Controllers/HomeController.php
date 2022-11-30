<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
        return view('admin.dashboard');
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
