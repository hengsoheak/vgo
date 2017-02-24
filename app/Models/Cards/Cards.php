<?php namespace App\Models\Cards;

use App\Models\MyModels;

class Cards extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'card';

    public function Card_Description()
    {
        return $this->hasMany(Card_Description::class);
    }
}
