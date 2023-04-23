<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $foto = $user->getAvatar();
            $finduser = User::where('google_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'),
                    'url_photo' => $foto
                ]);

                Auth::login($newUser);

                return redirect('password');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function updatepassword()
    {
    }
}
