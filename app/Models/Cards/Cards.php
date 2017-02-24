<?php namespace App\Models\Cards;

use App\Models\MyModels;

class Cards extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'card';

    public function cardDescr()
    {
        return $this->hasMany('App\Models\Cards\CardDescription', 'card_ids', 'id');
    }
}
