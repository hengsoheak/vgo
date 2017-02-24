<?php namespace App\Models\Cards;

use App\Models\MyModels;

class Cards extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'card';

    public function card_description()
    {
        return $this->hasMany('App\Models\Cards\Card_Description', 'card_ids', 'id');
    }
}
