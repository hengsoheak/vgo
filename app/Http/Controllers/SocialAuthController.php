<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SocialModels\SocialAccount;
use App\User;
use DB;
use Auth;
Use Redirect;
use Laracasts;


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
            case 'linkedin':
                //return Socialite::driver('linkedin')->redirect();
                return Socialite::with('linkedin')->redirect();
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
                break;
            case 'twitter':
                $providerUser = Socialite::driver('twitter')->stateless()->user();
                break;
            case 'linkedin':
                $providerUser = Socialite::driver('linkedin')->user();//Socialite::driver('linkedin')->user();

                break;
        }

        $authUser = $this->_findOrCreateUser($providerUser,$providerType);
        if(!$authUser){
            flash()->overlay('An account for that email already exists!', 'Error');
            return redirect('/home');
        }
        Auth::login($authUser, true);
        return redirect('/home');
    }
    private function _findOrCreateUser($userProvider,$providerType)
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

        $authUser = User::with(['SocialAccount'=>function($q)use ($providerType){
            $q->where('provider', $providerType);
        }])->where('email', $userProvider->email)->first();

        if (!empty($authUser) ) {

            if(count($authUser->SocialAccount) == 0) {

                $this->createSocislAccount($authUser, $userProvider, $providerType);

            }
            return $authUser;
        }

        $users = new user();
        $users->name = $userProvider->name;
        $users->email = $userProvider->email;

        if ($users->save()) {

            $this->createSocislAccount($users, $userProvider, $providerType);
            DB::commit();
            return $users;

        }else {
            return ['result'=>true];
        }
    }

    private function createSocislAccount ($users=null, $userProvider=null, $providerType=null){

        $findExistingAcc = SocialAccount::where('user_id', $users->id)->first();
        
	    $socialAccount = new SocialAccount();

        if(count($findExistingAcc) > 0 ) {

            $socialAccount = SocialAccount::find($findExistingAcc->id);

        }
        $socialAccount->provider = $providerType;
        $socialAccount->provider_user_id = $userProvider->id;
        $socialAccount->user_id = $users->id;
        $socialAccount->user_data = json_encode($userProvider->user);
        $socialAccount->avatar = strtolower($userProvider->avatar);

        if($socialAccount->save()){
            return true;
        }else{
            return false;
        }
    }

}
