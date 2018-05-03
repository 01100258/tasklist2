<?php


//ログインとサインアップ
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

//ここまで






// Route::get('/', 'WelcomeController@index');
Route::get('/', 'TasksController@index')->name('tasks.home');

Route::resource('tasks', 'TasksController');
Route::resource('parenttasks', 'ParenttasksController');


//認証できた者だけがタスクコントローラーにアクセス可
Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show','create','edit','delete']]);
    Route::resource('tasks', 'TasksController', ['only' => ['create','store','edit','update','destroy']]);
});


