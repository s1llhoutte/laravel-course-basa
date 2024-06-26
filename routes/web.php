<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaa';
});

Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/posts/create', 'App\Http\Controllers\PostController@create');
Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');
