<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Providers\RouteServiceProvider;
use App\User;
use App\VerifyUser;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware(['guest','XssSanitization']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'family' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => array(
                'required','string', 'min:6', 'confirmed',
                'regex:/([A-Za-z]+[0-9]|[0-9]+[A-Za-z])[A-Za-z0-9]*/u'
            ),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'family' => $data['family'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => Str::random(40)
        ]);

        try{
            Mail::to($user->email)->send(new VerifyMail($user));
        } catch (\Exception $exception){
            Log::error('Error sending mail',['Error Text'=> $exception->getMessage() ]);
        }

        if ($user && $verifyUser){
            Session::flash('user_create_success', __('User Created Successfully'));
            return $user;
        } else {
            Session::flash('user_create_error', __('User Not Created'));
            return redirect()->back();
        }

    }

    protected function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();

                // Write Email Verify Date
                $user->email_verified_at= Carbon::now();
                $user->save();

                $status = (App::getLocale() === 'en')
                    ? 'Your e-mail is verified. You can now login.'
                    : 'ایمیل شما تایید شد. اکنون می توانید وارد شوید.';
            }else{
                $status = (App::getLocale() === 'en')
                    ? 'Your e-mail is already verified. You can now login.'
                    : 'ایمیل شما قبلا تایید شده است. اکنون می توانید وارد شوید.';
            }
        }else{
            $msg = (App::getLocale() === 'en')
                ? 'Sorry your email cannot be identified.'
                : 'متاسفانه شما معتبر نیست!';

            return redirect('/authentication')->with('warning', $msg);
        }

        return redirect('/authentication')->with('status', $status);
    }

    // override functions
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        $msg = (App::getLocale() === 'en')
            ? 'We sent you an activation code. Check your email and click on the link to verify.'
            : 'کد فعال سازی برای شما ارسال شد. ایمیل خود را بررسی کنید و برای تایید روی لینک فعالسازی کلیک کنید.';
        return redirect('/authentication')->with('status', $msg);
    }

}
