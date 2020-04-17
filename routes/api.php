<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('register', 'Auth\UserController@store');
        Route::post('login', 'Auth\UserController@login');

        Route::middleware('auth')->group(function(){
            Route::get('user', 'Auth\UserController@show');
            Route::post('logout', 'Auth\UserController@logout');
            Route::post('refresh', 'Auth\UserController@refresh');
        });
    });
});