<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    //
    // return Socialite::driver('github')->redirect();
    // return Socialite::driver('github')->user();
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider) {
        $user = Socialite::driver($provider)->stateless()->user();
        dd($user);
    }
}
