<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;



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
        $this->middleware(['guest','XssSanitization'])->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        // Set Custom Remember Me Expire Time
        $rememberTokenExpireMinutes = 3*24*60; // 3 days
        $rememberTokenName = \Illuminate\Support\Facades\Auth::getRecallerName();
        // reset that cookie's expire time
        Cookie::queue($rememberTokenName, Cookie::get($rememberTokenName), $rememberTokenExpireMinutes);


        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }


        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($this->redirectPath());
    }


    // override functions
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|email',
            'password' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->verified) {
            auth()->logout();
            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
        }

        return redirect(url('my_account'));
        //return redirect()->intended($this->redirectPath());
    }

    public function logout(Request $request)
    {
        $current_lang = session()->get('lang');
        $current_theme = session()->get('theme');

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // reasign language & theme sessions
        session()->put('lang' , $current_lang);
        session()->put('theme' , $current_theme);

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }


}
