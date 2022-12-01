<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function getStaff(Request $request)
    {
        $staff = User::where('email', 'LIKE', '%'.$request->keyword.'%')->get();
        return response()->json($staff);
    }
}
