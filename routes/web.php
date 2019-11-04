<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('products', 'ProductController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('search', 'ProductController@search')->name('search');

Route::get('/permission', 'HomeController@permission')->name('permission');
Route::get('permissionupdate', 'HomeController@newPermission');

