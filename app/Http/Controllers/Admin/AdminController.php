<?php
/**
 * Created by PhpStorm.
 * User: sopheak
 * Date: 2/17/2017 AD
 * Time: 9:26 PM
 */

namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class AdminController extends Controller {

    public $lang_id;

    public function __construct()
    {
        //parent::__construct();
        $this->lang_id = $this->lang();
    }

    protected function lang() {
        return 1;
    }

}