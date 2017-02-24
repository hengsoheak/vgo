<?php namespace App\Models\Cards;

use App\Models\MyModels;

class Card_Type_Description extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'card_type_description';
    
    public function Cards() {

        return $this->hasMany(Cards::class);

    }
}
