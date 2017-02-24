<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Models\Cards\CardType;

class HomeController extends FrontController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function get_cards() {

        $cards = CardType::with(['Card_Type_Description','cards','cards.card_description'])->get();
        if(count($cards) > 0) {
            return ['cards'=>$cards];
        }
        return ['cards'=>false];
    }
}
