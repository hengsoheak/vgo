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
                break;
            case 'google':
                $providerUser = Socialite::driver('google')->stateless()->user();
                dd($providerUser);
                break;
        }
        //return Socialite::with('twitter')->stateless()->redirect();

        $authUser = $this->_findOrCreateUser($providerUser,$providerType);

        Auth::login($authUser, true);

        return redirect('/home');

    }

    private function _findOrCreateUser($user,$providerType)
    {
//        User {#199 ▼
//        +accessTokenResponseBody: array:4 [▼
//    "access_token" => "ya29.GmLzAxIO6uuRfhixRpUjcluLq7DB1ok4hReSVkWzJdkjffejFIWXaDGXwWJ1qgqL8tC7lhroAbUWE_0GWBWU07o1qt7wjl3CG7T5hJ9B0xcLOkTjQ0RQqRMXOcvFhCdO44frHQ"
//    "expires_in" => 3600
//    "id_token" => "eyJhbGciOiJSUzI1NiIsImtpZCI6IjgzYjhmMzE0MWQ0MTU0MjMxMThhZDIzMmFjN2IxYzdmYTdjYTRmMmQifQ.eyJpc3MiOiJhY2NvdW50cy5nb29nbGUuY29tIiwiaWF0IjoxNDg3MTI5NjA4LCJleHAiOjE0O ▶"
//    "token_type" => "Bearer"
//  ]
//  +token: "ya29.GmLzAxIO6uuRfhixRpUjcluLq7DB1ok4hReSVkWzJdkjffejFIWXaDGXwWJ1qgqL8tC7lhroAbUWE_0GWBWU07o1qt7wjl3CG7T5hJ9B0xcLOkTjQ0RQqRMXOcvFhCdO44frHQ"
//        +refreshToken: null
//        +expiresIn: 3600
//        +id: "110219420494656488573"
//        +nickname: null
//        +name: ""
//        +email: "myadgogle@gmail.com"
//        +avatar: "https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50"
//        +user: array:13 [▼
//    "kind" => "plus#person"
//    "etag" => ""FT7X6cYw9BSnPtIywEFNNGVVdio/FyApRrC99qh_mWI-Obvenc1-1dU""
//    "emails" => array:1 [▼
//      0 => array:2 [▼
//        "value" => "myadgogle@gmail.com"
//        "type" => "account"
//      ]
//    ]
//    "objectType" => "person"
//    "id" => "110219420494656488573"
//    "displayName" => ""
//    "name" => array:2 [▼
//      "familyName" => ""
//      "givenName" => ""
//    ]
//    "image" => array:2 [▼
//      "url" => "https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50"
//      "isDefault" => true
//    ]
//    "isPlusUser" => false
//    "language" => "en"
//    "ageRange" => array:1 [▼
//      "min" => 21
//    ]
//    "circledByCount" => 0
//    "verified" => false
//  ]
//}

//        Facebook:
//        User {#200 ▼
//        +token: "EAABdevi4haIBACE9zAW3KhlMKMLBBdZACgnscupaWLSM5zwSwpADLrtrZCYVZB4bqGyEjjEI2SoNtN8Uef6qkz1KzyNvt30RvfcfxYdBKwd8ZBsX1gFVA2WBg9ZAjLHId1NegmF16AMyxmQq42PNNZAgJZBApel ▶"
//        +refreshToken: null
//        +expiresIn: "5183999"
//        +id: "103605850163217"
//        +nickname: null
//        +name: "Riya Kh"
//        +email: "riyakh02@gmail.com"
//        +avatar: "https://graph.facebook.com/v2.8/103605850163217/picture?type=normal"
//        +user: array:6 [▼
//    "name" => "Riya Kh"
//    "email" => "riyakh02@gmail.com"
//    "gender" => "female"
//    "verified" => true
//    "link" => "https://www.facebook.com/app_scoped_user_id/103605850163217/"
//    "id" => "103605850163217"
//  ]
//  +"avatar_original": "https://graph.facebook.com/v2.8/103605850163217/picture?width=1920"
//        +"profileUrl": "https://www.facebook.com/app_scoped_user_id/103605850163217/"
//}

        DB::beginTransaction();

        //1 check if empty email (user not provide email);
        //2 check for provide company or provider name (facebook,twitter,google,...)
        //3 checking for if they file on email and password. system will input or update too.

        $authUser = User::where('email', $user->email)->first();
        $result = [];
        if (!empty($authUser)) {
            return $authUser;
        }

//        switch ($providerType) {
//            case 'facebook':
//
//                break;
//            case 'google':
//
//                break;
//        }

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
            $socialAccount->user_data = $users->user;
            $socialAccount->avatar = $users->avatar;

            $result = $socialAccount->save();
        }
        if (!is_array($result) && $result == true) {

            DB::commit();
            return $socialAccount->attributes;
        }

    }
}
