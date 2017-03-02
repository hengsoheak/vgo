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
        parent::__construct();
        $this->middleware('auth');

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

        $cards = CardType::with(['CardTypeDescription'=>function($q) {
            $q->where('lang_id', $this->lang_id);
        }])->with(['cards', 'cards.cardDescr'=>function($q) {
            $q->where('lang_id', $this->lang_id);
        }])->get();

        if(count($cards) > 0) {
            return ['cards_type'=>$cards];
        }
        return ['cards_type'=>false];
    }
}
