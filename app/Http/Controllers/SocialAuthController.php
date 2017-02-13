<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialModels\SocialAccount;
use App\User;
use DB;


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

        $providerUser = Socialite::driver('facebook')->stateless()->user();

        $authUser = $this->_findOrCreateUser($providerUser);

        Auth::login($authUser, true);

        return redirect('/home');

    }

    private function _findOrCreateUser($user)
    {
        DB::beginTransaction();
        $authUser = User::where('email', $user->email)->first();
        $result = [];
        if (!empty($authUser)) {

            return $authUser;

        }
        $users = new user();
        $users->name = $user->name;
        $users->email = $user->email;

        if($users->save()){

            $socialAccount = new SocialAccount();
            $socialAccount->provider = 'facebook';
            $socialAccount->provider_user_id = $user->id;
            $socialAccount->user_id ;
            $result = $socialAccount->save();
        }
        if(!is_array($result) && $result == true) {

            DB::commit();
            return $socialAccount->attributes;//attributes
        }

    }
}
