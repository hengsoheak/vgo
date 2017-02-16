<?php namespace App\Models\SocialModels;

use App\Models\MyModels;

class SocialAccount extends MyModels
{
    //protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
