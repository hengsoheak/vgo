<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    //
    public function redirect()
    {
        //dd(Socialite::driver('facebook')->redirect());
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        // when facebook call us a with token
    }
}
