<?php

use Illuminate\Support\Facades\Route;

Route::post('/login', 'Api\v1\Shared\LoginController@login')->name('login');

Route::group(['middleware' => ['auth:api', 'role:administrator']], function () {
    Route::resource('user', 'Api\v1\Application\UserController');
    Route::resource('student', 'Api\v1\Application\StudentController');
    Route::resource('faculty', 'Api\v1\Application\FacultyController');
    Route::resource('class', 'Api\v1\Application\ClassroomController');
    Route::resource('section', 'Api\v1\Application\SectionController');
});

Route::group(['middleware' => ['auth:api', 'role:moderator']], function () {
});


