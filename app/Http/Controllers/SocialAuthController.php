<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAuth;
use App\User;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $account = SocialAuth::where([
           'provider' => $provider,
           'social_id' => $user->id
        ])->first();

        if ($account) {
            //Autentica
            auth()->login($account->user);
            return redirect()->to('/');
        }

        $localUser = User::where('email', $user->email)->first();
        if ($localUser) {
            //Não autentica
            return redirect()->to('/');
        }

        $newUser = new User;
        $newUser->name = $user->name;
        $newUser->email = $user->email;
        $newUser->password = md5($user->email);
        $newUser->save();

        $account = new SocialAuth;
        $account->provider = $provider;
        $account->social_id = $user->id;
        $account->user_id = $newUser->id;
        $account->save();

        auth()->login($newUser);
        return redirect()->to('/');
    }
}
