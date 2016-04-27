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
Route::get('/lists', 'ListController@getIndex');

//Create
Route::get('/lists/create', 'ListController@getCreate');
Route::post('/lists/create', 'ListController@postCreate');

//Edit
Route::get('/lists/edit/{id?}', 'ListController@getEdit');
Route::post('/lists/edit', 'ListController@postEdit');

//Show
Route::get('/show', 'ListController@getShow');
