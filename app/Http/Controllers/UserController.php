<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Tag;
use App\Models\Visit;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('user-access:user');
    }

    public function userDashboard()
    {
        // $appointments = Appointment::orderByDesc('updated_at')->paginate(5);
        // $visits = Visit::orderByDesc('updated_at')->where('status', 1)->paginate(5);
        // $tags = Tag::where('status', 0)->get();
        // return view('user.dashboard', compact('visits', 'appointments', 'tags'));
        return view('user.dashboard');
    }
}
