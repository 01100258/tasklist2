<?php

Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

Route::get('/', 'WelcomeController@index');

//Route::resource('tasks', 'TasksController');

