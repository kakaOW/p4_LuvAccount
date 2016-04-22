<?php

#Authentication
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');
Route::get('/show-login-status', function() {
    # You may access the authenticated user via the Auth facade
    $user = Auth::user();
    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }
    return;
});

#List specific routes

//Home
Route::get('/list', 'RandomUserController@getIndex');

//Create
Route::get('/list/create', 'LoremIpsumController@getCreate');
Route::post('/list/ceate', 'LoremIpsumController@postCreate');

//Edit
Route::get('/list/{id?}', 'RandomUserController@getEdit');
Route::post('/list/{id?}', 'RandomUserController@postEdit');

//Show
Route::get('/list/{id?}', 'RandomUserController@getShow');
