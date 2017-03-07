<?php

namespace App\Http\Controllers\Admin;

use Request;
use Auth;

class HomeController extends AdminController
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        return view('admin.home');
    }

}
