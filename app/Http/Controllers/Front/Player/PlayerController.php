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

use App\Http\traits\Images\ImagesController;

class PlayerController extends FrontController {

    public function __construct()
    {
    }

    public function cards() {

        //$img = Image::make(public_path('image/card/new/large.jpg'));

        //$img->mask(public_path('image/card/faces/c.png'));

        ///$img->mask(public_path('image/card/faces/masted.png'), true);

//        $img = Image::make(public_path('image/card/test.jpg'));
//        $url = 'https://graph.facebook.com/v2.8/1232156983565169/picture?width=150';
//        $this->save_image($url, public_path('image/card/new/large.jpg'));
//
//        $img->insert(public_path('image/card/new/large.jpg'), 'top-left', 20, 290);
//        $img->save(public_path('image/card/new/bar4.jpg'));
//
//        echo  '<html><img src="/image/card/new/bar4.jpg"></html>';
//
//        die();
        $img = Image::make(public_path('image/card/test.jpg'));
//
//
//            //public_path('image/card/watermark.png')
//            //$img->fit(120, 90)->encode('png', 100);
////            dd($social_user->avatar);\
//
        $social_user = SocialAccount::where(['user_id'=> Auth::user()->id, 'provider'=>Auth::user()->provider])->first();

        if(count($social_user) > 0 && $this->save_image($social_user->avatar, public_path('image/card/new/'.$social_user->user_id.'.jpg'))){

            $this->circle($social_user->avatar, public_path('image/'.$social_user->user_id.'.jpg'), $social_user->user_id);

            $img->insert(public_path('image/'.$social_user->user_id.'.png'), 'top-left', 20, 290);

            $img->save(public_path('image/card/new/bar3.jpg'));
            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';
        }
    }

    private function circle($img, $id) {

        $base = new \Imagick(public_path($img));
        $mask = new \Imagick(public_path('image/mask.png'));

        $base->compositeImage($mask, \Imagick::COMPOSITE_COPYOPACITY, 0, 0);
        $base->writeImage(public_path('image/'.$id.'.png'));
//
//        return;
//
//        //Create a ImagickDraw object to draw into.
//        $draw = new \ImagickDraw(public_path('image/card/new/18.jpg'));
//
////        $strokeColor = new \ImagickPixel($strokeColor);
//  //      $fillColor = new \ImagickPixel($fillColor);
//
//    //    $draw->setStrokeOpacity(1);
//      //  $draw->setStrokeColor($strokeColor);
//       // $draw->setFillColor($fillColor);
//
//  //      $draw->setStrokeWidth(3);
////        $draw->setFontSize(18);
//
////            $img->insert(public_path('image/card/new/'.$social_user->user_id.'.jpg'), 'top-left', 20, 290);//public_path('image/card/watermark.png')
/////            $img->resize(320, 240);
////            $img->save(public_path('image/card/new/bar3.jpg'));
////            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';
//
////        $draw->circle(100, 100, 50, 50);
//        $imagick = new \Imagick();
//        $imagick->newImage(400, 400, $backgroundColor);
//        $imagick->setImageFormat("png");
//        $imagick->drawImage($draw);
//
//        header("Content-Type: image/png");
//        echo $imagick->getImageBlob();
    }
}
