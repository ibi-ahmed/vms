<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('user-access:staff');
    }

    public function staffDashboard()
    {
        return view('staff.dashboard');
    }

}
