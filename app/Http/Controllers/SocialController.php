<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider){
        $social_user = Socialite::driver($provider)->user();

        $user = User::where('email', $social_user->getEmail())->first();
        if(!$user){
            $user = User::create([
                'name' => null, // 추후 등록
                'email' =>  $social_user->getEmail(),
                'userid' => $social_user->getId(),
                'provider_id' => $social_user->getId(),
                'provider' => $provider,
            ]);
        }

        $user->update([
           'last_login_at' => now()
        ]);
        Auth::login($user);
        return redirect("/home");
    }
}
