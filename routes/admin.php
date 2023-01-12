<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin-login', 'Auth\LoginController@adminlogin')->name('admin.login');

// Route::get('/admin/home', 'HomeController@admin')->name('admin.home')->middleware('is_admin');

// Route::get('check',function(){
//     echo "Admin route";
// });

Route::group(['namespace'=>'Admin', 'middleware'=>'is_admin'], function(){
    Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

    // Category Routes
    Route::group(['prefix'=>'category'], function(){
        Route::get('/', 'CategoryController@index')->name('category.index');
    });
});
