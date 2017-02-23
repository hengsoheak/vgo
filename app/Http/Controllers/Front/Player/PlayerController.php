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

        $this->circle('45454545', '345345', 'red', 12, 133, 100, 100);
        dir();

        $img = new ImagesController();
        $img->create(800, 800, true);

        $img2 = new ImagesController(public_path('image/12.png'));
        $img2->circleCrop();
        $img->merge($img2, 10, 10);
        dd($img2);


//        $img = Image::make(public_path('image/card/test.jpg'));
//        //$img->resize(320, 240);
//
//
//            //public_path('image/card/watermark.png')
//            //$img->fit(120, 90)->encode('png', 100);
////            dd($social_user->avatar);\
//
//        $social_user = SocialAccount::where(['user_id'=> Auth::user()->id, 'provider'=>Auth::user()->provider])->first();
//
//        if(count($social_user) > 0 && $this->save_image($social_user->avatar, public_path('image/card/new/'.$social_user->user_id.'.jpg'))){
//
//            $img->insert(public_path('image/card/new/'.$social_user->user_id.'.jpg'), 'top-left', 20, 290);//public_path('image/card/watermark.png')
//            //convert -size 200x200 xc:none -fill walter.jpg -draw "circle 100,100 100,1" circle_thumb.png
//
//            $img->save(public_path('image/card/new/bar3.jpg'));
//            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';
//
//        }
    }

    private function circle($strokeColor, $fillColor, $backgroundColor, $originX, $originY, $endX, $endY) {

        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($strokeColor);
        $fillColor = new \ImagickPixel($fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        $draw->circle($originX, $originY, $endX, $endY);

        $imagick = new \Imagick();
        $imagick->newImage(500, 500, $backgroundColor);
        $imagick->setImageFormat("png");
        $imagick->drawImage($draw);

        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}
