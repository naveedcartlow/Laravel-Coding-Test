<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\SearchController@listing')->name('listing');

Route::get('/listing', 'App\Http\Controllers\SearchController@listing')->name('listing');
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');