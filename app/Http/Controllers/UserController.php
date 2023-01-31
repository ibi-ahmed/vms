<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function superDashboard()
    {
        $this->authorize('superDashboard', User::class);
        return view('super.dashboard');
    }

    public function adminDashboard()
    {
        $this->authorize('adminDashboard', User::class);
        return view('admin.dashboard');
    }

    public function staffDashboard()
    {
        $this->authorize('staffDashboard', User::class);
        return view('staff.dashboard');
    }

    public function securityDashboard()
    {
        $this->authorize('securityDashboard', User::class);
        return view('user.security-dashboard');
    }
    
    public function contractorDashboard()
    {
        $this->authorize('contractorDashboard', User::class);
        return view('user.contractor-dashboard');
    }

    public function addUser()
    {
        $this->authorize('create', User::class);
        $roles = Role::whereBetween('id', [1, 2])->get();
        return view('user.register', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $this->authorize('create', User::class);
        $input = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required'],
        ]);

        User::create($input);
        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'New User Created!');
    }
}
