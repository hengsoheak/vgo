<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;
use App\Models\SocialModels\SocialAccount;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $_data = [];
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function privancy() {

        return view('FrontEnd.privancy', $this->_data);
    }
}
