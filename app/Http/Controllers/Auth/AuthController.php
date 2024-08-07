<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider)
    {
        try {
            $socialite_user = Socialite::driver($provider)->user();
        } catch (\Exception $ex) {
            return redirect()->route('login');
        }

        $user = User::where('email', $socialite_user->getEmail())->first();
        if (!$user) {
            $user = User::create([
                'name' => $socialite_user->getName(),
                'provider_name' => $provider,
                'profile_photo_path' => $socialite_user->getAvatar(),
                'email' => $socialite_user->getEmail(),
                'password' => Hash::make($socialite_user->getId()),
                'email_verified_at' => Carbon::now()
            ]);
        }

        auth()->login($user, $remember = true);
        alert()->success('ورود شما موفقیت آمیز بود.', 'تشکر')->persistent('حله');

        return redirect()->route('home.index');
    }
    public function logout(Request $request)
    {
        auth()->logout($request);

        return redirect('/');
    }
    //Hadi
    public function register(Request $request)
    {
        return view('auth.register');

    }
    //Hadi
}
