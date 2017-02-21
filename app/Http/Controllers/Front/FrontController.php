<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/17/2017 AD
 * Time: 9:26 PM
 */

namespace app\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class FrontController extends Controller {




    public function __construct()
    {
        parent::__construct();

    }


    protected function save_image($img, $fullpath){

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
        $rawdata = curl_exec($ch);

        if(curl_error($ch)) {

            return curl_error($ch);
        }
        curl_close($ch);

        if(file_exists($fullpath)){
            unlink($fullpath);
        }

        $fp = fopen($fullpath, 'x');
        fwrite($fp, $rawdata);
        RETURN fclose($fp);

    }

    private function IfWriteable($filename) {

        $write = false;
        if (is_writable($filename)) {

            if (!$handle = fopen($filename, 'x')) {
                //echo "Cannot open file ($filename)";

            }


        } else {
            //echo "The file $filename is not writable";

            $write = 1;
        }
        return ['return'=>$write, 'file'=>$filename];
    }
}