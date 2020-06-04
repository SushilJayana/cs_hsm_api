<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource('user', 'Api\v1\Application\UserController');

Route::post('/login', 'Api\v1\Shared\LoginController@login')->name('login');

Route::group(['middleware' => ['role:administrator']], function () {
    Route::get('/admin', function () {
        return "admin";
    })->middleware('auth:api');
});

Route::group(['middleware' => ['role:faculty']], function () {
    Route::get('/faculty', function () {
        return "faculty";
    })->middleware('auth:api');
});



