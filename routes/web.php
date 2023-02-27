<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//frontend all routes here----------
Route::group(['namespace'=>'Front'], function(){
    Route::get('/','IndexController@index');
    Route::get('/product-details/{slug}','IndexController@ProductDetails')->name('product.details');
});
