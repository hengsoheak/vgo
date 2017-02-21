<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/17/2017 AD
 * Time: 12:16 AM
 */

namespace app\Http\Controllers\Front\Player;
use App\Models\SocialModels\SocialAccount;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;



class PlayerController extends FrontController
{



    public function __construct()
    {

    }


    public function cards() {

        $img = Image::make(public_path('image/card/new/large.jpg'));

        $img->mask(public_path('image/card/faces/1.png'), true);

        //$img->mask(public_path('image/card/faces/2.png'), true);


        echo  '<html><img src="/image/card/new/large.jpg"></html>';

die();
        $img = Image::make(public_path('image/card/test.jpg'));
        $social_user = SocialAccount::where(['user_id'=> Auth::user()->id, 'provider'=>Auth::user()->provider])->first();

        if(count($social_user) > 0 && $this->save_image($social_user->avatar, public_path('image/card/new/'.$social_user->user_id.'.jpg'))){

            $img->insert(public_path('image/card/new/'.$social_user->user_id.'.jpg'), 'top-left', 20, 290);//public_path('image/card/watermark.png')
            $img->save(public_path('image/card/new/bar3.jpg'));
            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';

        }
    }


}
