<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
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
        // $this->middleware('guest')->except('logout');
    }

    public function staffLogin()
    {
        $azureUser = Socialite::driver('azure')->user();

        $user = User::where('azure_id', $azureUser->id)->first();
        
        if ($user !=null ) {
            $user->name = str_replace(',', '', $azureUser->name);
            $user->email = strtolower($azureUser->email);
            $user->token = $azureUser->token;
        }else{
            $user = new User();
            $user->name = str_replace(',', '', $azureUser->name);
            $user->email = strtolower($azureUser->email);
            $user->role_id = 3;
            $user->azure_id = $azureUser->id;
            $user->token = $azureUser->token;
        }
        
        $user->save();
        Auth::login($user);

        return redirect()->route(strtolower(Auth::user()->role->name).'.dashboard');
        // return redirect()->route(.'dashboard');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->role_id == Role::IS_SUPER) {
                return redirect()->route('super.dashboard');
            } else if (auth()->user()->role_id == Role::IS_ADMIN) {
                return redirect()->route('admin.dashboard');
            } else if (auth()->user()->role_id == Role::IS_STAFF) {
                return redirect()->route('staff.dashboard');
            } else if (auth()->user()->role_id == Role::IS_SECURITY) {
                return redirect()->route('security.dashboard');
            } else if (auth()->user()->role_id == Role::IS_CONTRACTOR) {
                return redirect()->route('contractor.dashboard');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }

    public function staffLogout(Request $request)
    {
        // Auth::guard()->logout();
        // $request->session()->flush();
        return redirect()->route('logout');
        // $azureLogoutUrl = Socialite::driver('azure')->getLogoutUrl(route('login'));
        // return redirect($azureLogoutUrl);
    }
}
