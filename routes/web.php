<?php

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('redirect', 'SocialAuthController@redirect');
Route::get('callback', 'SocialAuthController@callback');

Auth::routes();

Route::get('/home', 'Controller@index');
