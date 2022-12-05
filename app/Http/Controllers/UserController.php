<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('user-access:user');
    }

    public function userDashboard()
    {
        return view('user.dashboard');
    }
}
