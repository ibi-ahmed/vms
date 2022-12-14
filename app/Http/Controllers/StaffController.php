<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{

    public function __construct()
    {
        // $this->middleware('user-access:staff');
    }

    public function staffDashboard()
    {
        $visits = Visit::where('user_id', Auth::user()->id)->get();
        $appointments = Appointment::where('staff_id', Auth::user()->id)
            ->orderByDesc('updated_at')
            ->get();
        return view('staff.dashboard', compact('visits', 'appointments'));
    }
}
