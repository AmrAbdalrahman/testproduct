<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/




Route::group(['middleware' => 'web'], function(){


    Route::auth();

    // product
    Route::get('/home', 'HomeController@index');
    Route::get('/addproduct', 'ProductController@index');
    Route::post('/addproduct', 'ProductController@store');
    Route::get('/', 'ProductController@showAllEnable');
    Route::get('/SingleProduct/{id?}/{name?}','ProductController@showproduct');

    Route::get('/edit/{id?}/{name?}','ProductController@userEditProduct');

    Route::patch('/user/update/product/{id?}','ProductController@userUpdateProduct')->middleware('auth');

    Route::get('/delete/{id?}/{name?}','ProductController@destroy')->middleware('auth');


    /// images
    
    Route::get('/image/add/{id?}', 'ImageController@index');
    
    Route::post('/image/add/{id?}', 'ImageController@store');
    Route::get('/image/edit/{id?}', 'ImageController@editimage');

    Route::patch('/image/update/{id?}','ImageController@updateimage');

    Route::get('/image/delete/{id?}/','ImageController@destroy');


});

