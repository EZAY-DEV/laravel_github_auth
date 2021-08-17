<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;

class SocialAuthController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try {
            $socialUser = Socialite::driver('github')->user();
            $user = User::where('github_id', $socialUser->id)->first();
            if ($user) {
                Auth::login($user);
                return redirect('/');
            } else {
                $createUser = User::create([
                    'name' => $socialUser->name,
                    'email' => $socialUser->email,
                    'github_id' => $socialUser->id,
                    'password' => encrypt('123456')
                ]);

                Auth::login($createUser);
                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
