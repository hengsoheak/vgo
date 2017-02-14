<?php

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('redirect/{facebook}', [
    'as'=>'redirectFacebook',
    'uses'=>'SocialAuthController@redirect'
])->where('google','[a-z]+');

Route::get('callback', 'SocialAuthController@callback');
//google

Route::get('redirect/{google}', [
        'as'=>'redirectGoogle',
        'uses'=>'SocialAuthController@redirect'
    ]
)->where('google','[a-z]+');

Route::get('callback/google', 'SocialAuthController@callback');

Auth::routes();

Route::get('/home', 'Controller@index');
