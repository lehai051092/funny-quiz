<?php

namespace App\Http\Controllers;

use App\SocialAccount;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use TJGazel\Toastr\Facades\Toastr;

class AuthController extends Controller
{
    public function googleLoginUrl($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function googleLoginCallback($social)
    {
        $googleUser = Socialite::driver($social)->stateless()->user();
        $accounts = SocialAccount::where('provider_user_id', 'like', $googleUser->id)->first();

        if ($accounts) {
            $user = $accounts->user()->first();

        } else {
            $email = $googleUser->user['email'];
            $account = new SocialAccount();
            $account->provider_user_id = $googleUser->id;
            $account->provider = $social;
            $user = User::where('email', 'like', $email)->first();
            if (!$user) {
                $user = new User();
                $user->name = $googleUser->user['name'];
                $user->password = Hash::make($googleUser->user['name']);
                $user->email = $email;
                $user->save();
            }
            $account->user()->associate($user);
            $account->save();
        }
        Auth::login($user);
        Toastr::success('Login success!');
        return redirect()->route('home');
    }
}
