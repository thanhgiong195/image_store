<?php

Route::group(['middleware' => 'locale', 'prefix' => Session::get('locale')], function() {

    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@changeLang',
    ]);

    //food route
    Route::get('/', 'FoodController@index')->name('home'); 
    Route::get('/food', 'FoodController@index'); 
    Route::get('food/create', 'FoodController@create')->name('food.create');
    Route::post('food/create', 'FoodController@store');
    Route::get('food/{id}/edit', 'FoodController@edit')->name('food.edit');
    Route::post('food/update', 'FoodController@update')->name('food.update');
    Route::get('food/{id}/delete', 'FoodController@destroy')->name('food.delete');
    Route::get('food/{id}', 'FoodController@show')->name('food.show');

    //auth
    Auth::routes();
    Route::get('/profile', 'UserController@index')->name('profile');
    Route::get('/profile/edit', 'UserController@edit')->name('user.edit');
    Route::post('/profile/update', 'UserController@update')->name('user.update');

    //comment
    Route::post('/comment/store', 'CommentController@store')->name('comment.add');

    //like
    Route::post('/food/like', 'LikeController@like')->name('food.like');

});