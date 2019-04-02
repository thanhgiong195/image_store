<?php

//food route
Route::get('/', 'FoodController@index'); 
Route::get('/food', 'FoodController@index'); 
Route::get('food/create', 'FoodController@create');
Route::post('food/create', 'FoodController@store');
Route::get('food/{id}/edit', 'FoodController@edit');
Route::post('food/update', 'FoodController@update');
Route::get('food/{id}/delete', 'FoodController@destroy');
Route::get('food/{id}', 'FoodController@show')->name('food.show');

//auth
Auth::routes();
Route::get('/profile', 'HomeController@index')->name('profile');

//comment
Route::post('/comment/store', 'CommentController@store')->name('comment.add');