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

//flickr

Route::get('redirect/{flickr}', [
        'as'=>'redirectFlickr',
        'uses'=>'SocialAuthController@redirect'
    ]
)->where('flickr','[a-z]+');

Route::get('callback/{flickr}', [
    'as'=>'callbackFlickr',
    'user'=>'SocialAuthController@callback'
])->where('flickr','[a-z]+');



































Auth::routes();

Route::get('/home', 'Controller@index');
