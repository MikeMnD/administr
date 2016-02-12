<?php

Route::group(['middleware' => ['web']], function(){

    Route::group(['middleware' => 'auth'], function(){
        Route::get('/', [
            'as'    => 'administr.dashboard.index',
            'uses'  => 'DashboardController@index'
        ]);

        Route::resource('users', 'UsersController', [
            'except'    => ['create', 'store'],
            'names'     => [
                'index'     => 'administr.users.index',
                'edit'      => 'administr.users.edit',
                'update'    => 'administr.users.update',
                'destroy'   => 'administr.users.destroy',
            ]
        ]);
    });
    
    /**
     * Auth routes
     */
    Route::get('auth/login', [
        'as'   => 'administr.auth.login',
        'uses' => 'AuthController@getLogin'
    ]);

    Route::post('auth/login', [
        'as'   => 'administr.auth.login',
        'uses' => 'AuthController@postLogin'
    ]);

    Route::get('auth/logout', [
        'as'   => 'administr.auth.logout',
        'uses' => 'AuthController@getLogout'
    ]);
});