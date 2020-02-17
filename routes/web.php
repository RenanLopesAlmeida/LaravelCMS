<?php


Route::get('/', function(){
    echo 'Home...';
});

Route::prefix('painel')->group(function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate');

    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('users', 'Admin\UserController@index');
    Route::resource('users', 'Admin\UserController');
});


