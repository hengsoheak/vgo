<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/17/2017 AD
 * Time: 12:16 AM
 */

namespace app\Http\Controllers\Front\Player;
use App\Models\Cards\Cards;
use App\Models\SocialModels\SocialAccount;
use App\Http\Controllers\Front\FrontController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;
use Intervention\Image\Facades\Image;
use App\Http\traits\Images\ImagesController;



class PlayerController extends FrontController {

    protected $images;

    public function __construct()
    {

    }

    public function cards($id) {


        $this->images = new ImagesController();

        $social_user = SocialAccount::where(['user_id'=> Auth::user()->id, 'provider'=>Auth::user()->provider])->first();

        $images = Cards::with(['cardDescr'])->first();
        $img = Image::make(public_path('image/12.png'));

        if(count($images) == 0 ){

            $img = Image::make(public_path('image/'.$images->cardDescr->img));
        }

        if(count($social_user) > 0 && $this->images->save_image($social_user->avatar, 'image/'.$social_user->user_id.'.jpg')){

            $this->images->circle($social_user->user_id.'.jpg', $social_user->user_id);

            $img->insert(public_path('image/'.$social_user->user_id.'.png'), 'top-left', 20, 290);

            $img->save(public_path('image/card/new/bar3.jpg'));
            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';
        }
    }

}
