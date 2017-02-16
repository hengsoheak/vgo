<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $_data = [];
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(){

        $this->_data['users']=  User::with('SocialAccount')->where('id',33)->first();

        return view('FrontEnd.Home',$this->_data);
    }
}
