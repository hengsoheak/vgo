<?php namespace App\Models\SocialModels;

use app\Models\Mymodel;

class SocialAccount extends Mymodel
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
