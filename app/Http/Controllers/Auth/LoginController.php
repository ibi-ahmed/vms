<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
     {  
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->role_id == Role::IS_SUPER) {
                return redirect()->route('super.dashboard');
            }else if (auth()->user()->role_id == Role::IS_ADMIN) {
                return redirect()->route('admin.dashboard');
            }else if (auth()->user()->role_id == Role::IS_STAFF) {
                return redirect()->route('staff.dashboard');
            }else if (auth()->user()->role_id == Role::IS_SECURITY) {
                return redirect()->route('security.dashboard');
            }else if (auth()->user()->role_id == Role::IS_CONTRACTOR) {
                return redirect()->route('contractor.dashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
}
