<?php namespace App\Models\SocialModels;

use app\Models\MyModel;

class SocialAccount extends MyModel
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
