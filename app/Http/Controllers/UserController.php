<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function superDashboard()
    {
        $this->authorize('superDashboard', User::class);
        $hq_count = Visit::where('status', 1)
            ->where('location_id', 1)->count();
        $annex_count = Visit::where('status', 1)
            ->where('location_id', 2)->count();
        return view('super.dashboard', compact('hq_count', 'annex_count'));
    }

    public function adminDashboard()
    {
        $this->authorize('adminDashboard', User::class);
        $hq_count = Visit::where('status', 1)
            ->where('location_id', 1)->count();
        $annex_count = Visit::where('status', 1)
            ->where('location_id', 2)->count();
        return view('admin.dashboard', compact('hq_count', 'annex_count'));
    }

    public function staffDashboard()
    {
        $this->authorize('staffDashboard', User::class);
        return view('staff.dashboard');
    }

    public function editStaffSearch()
    {
        $this->authorize('editStaffRole', User::class);
        return view('staff.edit-staff-search');
    }
    
    public function editStaffView(Request $request)
    {
        $this->authorize('editStaffRole', User::class);
        
        $staff = User::where('azure_id', $request->staff_id)->first();
        
        if ($staff !=null ) {
            $staff->name = $request->staff_name;
            $staff->email = $request->staff_email;
        }else{
            $staff = new User();
            $staff->name = $request->staff_name;
            $staff->email = $request->staff_email;
            $staff->role_id = 3;
            $staff->azure_id = $request->staff_id;
        }
        
        $staff->save();

        $roles = Role::whereBetween('id', [3, 4])->get();
        
        return view('staff.edit-staff-view', compact('staff', 'roles'));
    }

    public function editStaffRole(Request $request)
    {
        $this->authorize('editStaffRole', User::class);
        
        $staff = User::where('email', $request->email)->first();
        $staff->role_id = $request->role_id;
        $staff->save();

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'Profile Updated!');
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

        $user = new User();
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = bcrypt('123');
        $user->role_id = $input['role_id'];
        $user->save();
        
        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'New User Created!');
    }

    public function userProfile()
    {
        $this->authorize('userProfile', User::class);
        return view('user.profile');
    }
    
    public function updateUserProfile(Request $request, User $user)
    {
        $this->authorize('userProfile', User::class);
        $input = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        // $user = User::find($user->id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'Profile Updated!');
    }

    public function allUsers(Request $request)
    {
        $this->authorize('allUsers', User::class);
        $users = User::where('role_id', 1)
            ->orWhere('role_id', 2)
            ->paginate(10);
            
        return view('user.all', compact('users'));
    }

    public function searchUsers(Request $request)
    {
        $this->authorize('allUsers', User::class);
        $query = $request->get('query');
        // dd($query);
        $users = User::whereBetween('role_id', [1, 2]);

        $users = $users->where('name', 'LIKE', '%'.$query.'%')
            ->paginate(10);
        
        return view('user.all', compact('users'));
    }

    public function singleUser($id)
    {
        $this->authorize('singleUser', User::class);
        $user = User::find($id);
        return view('user.single-user', compact('user'));
    }

    public function edit($id)
    {
        $this->authorize('editUser', User::class);
        $user = User::find($id);
        return view('user.edit-user', compact('user'));
    }

    public function editUser(Request $request, User $user)
    {
        $this->authorize('editUser', User::class);
        $input = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
        ]);

        // $user = User::find($user->id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->save();

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard')->with('success', 'User Profile Updated!');
    }

}
