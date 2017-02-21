<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/17/2017 AD
 * Time: 12:16 AM
 */

namespace app\Http\Controllers\Front\Player;
use App\Models\SocialModels\SocialAccount;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;

class PlayerController extends BaseController
{
    public function __construct()
    {

    }

    public function cards() {

        $img = Image::make(public_path('image/card/test.jpg'));
        //$img->resize(320, 240);

        $social_user = SocialAccount::where(['id'=> Auth::user()->id,'provider'=>Auth::user()->provider])->first();

        //public_path('image/card/watermark.png')
        $img->insert($social_user->avatar, 'top-left', 20, 290);
        $img->save(public_path('image/card/new/bar3.jpg'));

        echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';
    }
}