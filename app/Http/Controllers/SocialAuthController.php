<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialModels\SocialAccount;
use App\User;
use DB;
use Auth;

class SocialAuthController extends Controller
{
    //
    public function __construct()
    {

    }

    public function redirect($providerType)
    {
        switch ($providerType) {
            case 'facebook':
                return Socialite::driver('facebook')->redirect();
                break;
            case 'google':
                //dd(Socialite::driver('google')->redirect());
                return Socialite::driver('google')->redirect();
                break;
            case 'twitter':
                return Socialite::driver('twitter')->redirect();
                break;
        }
    }

    public function callback($providerType=[])
    {
        switch ($providerType) {
            case 'facebook':
                $providerUser = Socialite::driver('facebook')->stateless()->user();
//		dd($providerUser);
                break;
            case 'google':
                $providerUser = Socialite::driver('google')->stateless()->user();
     //           dd($providerUser);
                break;
        }
        //return Socialite::with('twitter')->stateless()->redirect();

        $authUser = $this->_findOrCreateUser($providerUser);

        Auth::login($authUser, true);

        return redirect('/home');

    }

    private function _findOrCreateUser($user)
    {
        DB::beginTransaction();

        //1 check if empty email (user not provide email);
        //2 check for provide company or provider name (facebook,twitter,google,...)
        //3 checking for if they file on email and password. system will input or update too.

        $authUser = User::where('email', $user->email)->first();
        $result = [];
        if (!empty($authUser)) {

            return $authUser;

        }

        //check if new we should register new user. we should let user register without password (email from social) and if they try to login with they password and email we will announce to them
        //that your account was register without password so please file up your password

        $users = new user();
        $users->name = $user->name;
        $users->email = $user->email;

        if ($users->save()) {

            $socialAccount = new SocialAccount();
            $socialAccount->provider = 'facebook';
            $socialAccount->provider_user_id = $user->id;
            $socialAccount->user_id = $users->id;
            $result = $socialAccount->save();
        }
        if (!is_array($result) && $result == true) {

            DB::commit();
            return $socialAccount->attributes;
        }

    }
}
