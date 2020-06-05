<?php

use Illuminate\Support\Facades\Route;

Route::post('user','Api\v1\Application\UserController@store');


Route::post('/login', 'Api\v1\Shared\LoginController@login')->name('login');

Route::group(['middleware' => ['auth:api','role:administrator']], function () {
//    Route::resource('user', 'Api\v1\Application\UserController');
    Route::get('/admin', function () {
        return "admin";
    });
});

Route::group(['middleware' => ['auth:api','role:faculty']], function () {
    Route::get('/faculty', function () {
        return "faculty";
    });
});


