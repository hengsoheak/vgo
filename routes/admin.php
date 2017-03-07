<?PHP


Route::group(['prefix' => 'administration', 'middleware' => ['auth', 'admin']],

    function () {

        Route::get('/', [
            'middleware' => 'auth',
            'as' => 'administration',
            'uses' => 'Admin\HomeController@index'
        ]);

    });