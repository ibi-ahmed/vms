<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Visit;
use Ramsey\Uuid\Type\Integer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    

    public function getStaff(Request $request)
    {
        $staff = User::where('email', 'LIKE', '%'.$request->keyword.'%')
            ->orWhere('name', 'LIKE', '%'.$request->keyword.'%')
            ->get();
        return response()->json($staff);
    }

}
