<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    // Redirect
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Callback  
    public function callback($provider)
    {
        $social_user = Socialite::driver($provider)->user();

        $user = User::where(['email' => $social_user->getEmail()])->first();
        if ($user) {
            $user->update([
                'avatar'        => $social_user->getAvatar(),
                'provider_id'   => $social_user->getId(),
                'provider'      => $provider,
            ]);
        } else {
            $user = User::create([
                'name'          => $social_user->getName(),
                'email'         => $social_user->getEmail(),
                'avatar'        => $social_user->getAvatar(),
                'provider_id'   => $social_user->getId(),
                'provider'      => $provider,
            ]);
        }

        Auth::login($user);

        return redirect('/home');
    }
}
