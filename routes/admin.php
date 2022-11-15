<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin/home', 'HomeController@admin')->name('admin.home')->middleware('is_admin');

// Route::get('check',function(){
//     echo "Admin route";
// });
