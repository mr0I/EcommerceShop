<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        try {
            $adminUser = User::where('role_id','1')->first();
            $user = Socialite::driver('github')->user();
            $findUser = User::where('github_id', $user->id)->first();
            $duplicateEntry = User::where('email',$user->email)->first();

            if ($adminUser->email === $user->email){
                return redirect('/authentication')->with('oauthError','Admin can not login this way');
            }

            if ($findUser) {
                Auth::login($findUser);
                return redirect(route('my-account'));
            } elseif ($duplicateEntry) {
                Auth::login($duplicateEntry);
                return redirect(route('my-account'));
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'family' => '',
                    'role_id' => '2',
                    'google_id' => '',
                ]);
                Auth::login($newUser);

                return redirect(route('my-account'));
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

}
