<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('register', 'Auth\UserController@store');
        Route::post('login', 'Auth\UserController@login');

        Route::middleware('auth')->group(function(){
            // User Auth
            Route::get('user', 'Auth\UserController@show');
            Route::post('logout', 'Auth\UserController@logout');
            Route::post('refresh', 'Auth\UserController@refresh');
        });
    });

    Route::middleware('auth')->group(function(){
        // Address
        Route::get('street','Address\AddressController@street');
        Route::get('barangay','Address\AddressController@barangay');
        Route::get('municipal','Address\AddressController@municipal');
        Route::get('province','Address\AddressController@province');
        Route::get('region','Address\AddressController@region');

        Route::prefix('user')->group(function(){
            // User Address
            Route::get('{id}/address', 'User\AddressController@show');
            Route::post('{id}/address', 'User\AddressController@store');
            Route::put('{id}/address', 'User\AddressController@update');
            Route::delete('{id}/address', 'User\AddressController@destroy');
        });
    });
    
});