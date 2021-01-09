<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
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
    protected $redirectTo = '/';
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout() {
  Auth::logout();
  return redirect('/login');
        }
        public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
             $user=User::with('profile')->find(Auth::user()->id);
            if($user->profile && $user->profile->membership_type != 100 &&  $user->profile->membership_time != null && $user->profile->membership_time < Carbon::now()->format('Y-m-d') ){
                $user->profile->membership_time=null;
                $user->profile->membership_type=null;
                $user->profile->save();
            }
            return redirect()->intended('/');
        }  

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

}
