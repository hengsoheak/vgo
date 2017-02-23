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

    public function cards(Image $img) {


        $img = new ImagesController();
        $img->create(400, 400, true);

// first image; crop and merge with base.
        $img2 = new Img('./crop_1.png');
        $img2->circleCrop();
        $img->merge($img2, 50, 50);

// second image; crop and merge with base.
        $img3 = new Img('./crop_2.png');
        $img3->circleCrop();
        $img->merge($img3, 25, 200);

        $img->render();


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

    private function save_image($img, $fullpath){

        $ch = curl_init($img);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        curl_setopt( $ch, CURLOPT_URL, $img );
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
        curl_setopt( $ch, CURLOPT_ENCODING, "" );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );    # required for https urls
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 50 );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 20);
        curl_setopt( $ch, CURLOPT_MAXREDIRS, 10 );
        $rawdata=curl_exec($ch);
        curl_close($ch);
        if(file_exists($fullpath)){
            unlink($fullpath);
        }
        $fp = fopen($fullpath, 'x');
        fwrite($fp, $rawdata);
        RETURN fclose($fp);

    }

}
