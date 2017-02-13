<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //
    public function __construct()
    {

    }

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {

        $providerUser = \Socialite::driver('facebook')->user();
        dd($providerUser);
        // when facebook call us a with token
    }
}
