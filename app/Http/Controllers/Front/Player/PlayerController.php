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

        $img = Image::make(public_path('image/card/test.jpg'));
        $social_user = SocialAccount::where(['user_id'=> Auth::user()->id, 'provider'=>Auth::user()->provider])->first();

        if(count($social_user) > 0 && $this->save_image($social_user->avatar, public_path('image/card/new/'.$social_user->user_id.'.jpg'))){

            $img->insert(public_path('image/card/new/'.$social_user->user_id.'.jpg'), 'top-left', 20, 290);//public_path('image/card/watermark.png')
            $img->save(public_path('image/card/new/bar3.jpg'));
            echo  '<html><img src="http://camvgo.com/image/card/new/bar3.jpg"></html>';

        }
    }


    function save_image($img,$fullpath){

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
