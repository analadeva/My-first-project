<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class SocialController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Google authentication failed.']);
        }


        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {

            $usser = explode(' ', $user->getName());
            $newUser = User::create([
                'name' => $usser[0],
                'surname' => isset($usser[1]) ? $usser[1] : '',
                'email' => $user->getEmail(),
                'google_id' => $user->getId(), 
            ]);
        

            Auth::login($newUser);
        } else {

            Auth::login($existingUser);
        }


        return redirect()->intended(RouteServiceProvider::HOME);
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Facebook authentication failed.']);
        }


        $existingUser = User::where('email', $user->getEmail())->first();

        if (!$existingUser) {
            $usser = explode(' ', $user->getName());
            $newUser = User::create([
                'name' => $usser[0],
                'surname' => isset($usser[1]) ? $usser[1] : '',
                'email' => $user->getEmail(),
                'facebook_id' => $user->getId(), 
            ]);


            Auth::login($newUser);
        } else {
            Auth::login($existingUser);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
