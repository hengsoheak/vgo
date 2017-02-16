<?php

Route::get('/', function () {

    return view('layouts.app');
});

Route::get('redirect/{facebook}', [
    'as'=>'redirectFacebook',
    'uses'=>'SocialAuthController@redirect'
])->where('facebook','[a-z]+');

Route::get('callback/{facebook}', [
    'as'=>'',
    'uses'=>'SocialAuthController@callback'
])->where('facebook','[a-z]+');

//google

Route::get('redirect/{google}', [
        'as'=>'redirectGoogle',
        'uses'=>'SocialAuthController@redirect'
    ]
)->where('google','[a-z]+');

Route::get('callback/{google}', [
    'as'=>'callback',
    'user'=>'SocialAuthController@callback'
])->where('google','[a-z]+');

//twitter

Route::get('redirect/{twitter}', [
        'as'=>'redirectTwitter',
        'uses'=>'SocialAuthController@redirect'
    ]
)->where('twitter','[a-z]+');

Route::get('callback/{twitter}', [
    'as'=>'callbackTwitter',
    'user'=>'SocialAuthController@callback'
])->where('twitter','[a-z]+');

//linkedin

Route::get('redirect/{linkedin}', [
        'as'=>'redirectLinkedin',
        'uses'=>'SocialAuthController@redirect'
    ]
)->where('linkedin','[a-z]+');

Route::get('callback/{linkedin}', [
    'as'=>'callbackLinkedin',
    'user'=>'SocialAuthController@callback'
])->where('linkedin','[a-z]+');



































Auth::routes();

Route::get('/home', 'Controller@index');
