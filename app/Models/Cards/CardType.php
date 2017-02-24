<?php namespace App\Models\Cards;

use App\Models\MyModels;

class CardType extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'card_type';
    
    public function Cards() {

        return $this->hasMany(Cards::class);

    }

    public function Card_Type_Description() {

        return $this->hasMany(Card_Type_Description::class);

    }
}
