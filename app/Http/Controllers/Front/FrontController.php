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

    public $lang_id;

    public function __construct()
    {
        parent::__construct();

        $this->lang_id = $this->lang();
    }

    protected function lang() {
        return 1;
    }

}