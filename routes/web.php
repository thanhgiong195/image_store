<?php

Route::get('food', 'HomeController@index'); 
Route::get('food/create', 'HomeController@create');
Route::post('food/create', 'HomeController@store');
Route::get('food/{id}/edit', 'HomeController@edit');
Route::post('food/update', 'HomeController@update');
Route::get('food/{id}/delete', 'HomeController@destroy');
Route::get('food/{id}', 'HomeController@show');