<?php


    Auth::routes();

    Route::get('/', function () {

        return view('FrontEnd.Home');
    });

    Route::get('privancy', [
        'as'=>'privancy',
        'uses'=>'Controller@privancy'
    ]);

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



    Route::group(['prefix' => 'game'], function() {

        Route::get('cards/{id}', [
            'as' => 'cards',
            'uses' => 'Front\Player\PlayerController@cards'
        ])->where('id','[0-9]+');

        Route::get('get_cards', [
            'as'=>'get_cards',
            'uses'=>'Front\HomeController@get_cards'
        ]);

    });



