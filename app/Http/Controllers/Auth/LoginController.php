<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

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
        $this->validateLogin($request);
        $user = User::where($this->username(), $request->{$this->username()})->first();

        // dd($user->toArray());
        // dd($user->hasVerifiedEmail());

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if(!$user)
        {
            return redirect()
                    ->route('login')
                    ->with('error', 'Your credentials does not match with our system.');
        }

        if($user->status == '2')
        {
            return redirect()
                    ->route('login')
                    ->with('warning', 'Your account is inactive, please contact to admin.');
        }

        if($user->status == '3')
        {
            return redirect()
                    ->route('login')
                    ->with('error', 'Your account is deleted, please contact to admin.');
        }

        if($user->status == '4')
        {
            return redirect()
                    ->route('login')
                    ->with('info', 'Your account is blocked, please contact to admin.');
        }

        if ($user->hasVerifiedEmail())
        {
            if ($this->attemptLogin($request))
            {
                session()->flash('success', 'You are successfully logged in');
                return $this->sendLoginResponse($request);
            }
        }
        else
        {
            $this->incrementLoginAttempts($request);
            // return response()->json([
            //     'error' => 'This account is not activated.'
            // ], 401);
            return redirect()
                    ->route('login')
                    ->with('warning', 'You didn\'t confirm your email yet. ');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        // $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {        
        Auth::logout();
        session()->flash('success', 'You are successfully logged out');
        return redirect()->route('login');;
    }
}
