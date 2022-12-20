<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Tag;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user-access:admin');
    }

    public function adminDashboard()
    {
        $appointments = Appointment::orderByDesc('updated_at')->get();
        $visits = Visit::orderByDesc('updated_at')->where('status', 1)->get();
        $tags = Tag::where('status', 0)->get();
        return view('admin.dashboard', compact('appointments', 'visits', 'tags'));
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
