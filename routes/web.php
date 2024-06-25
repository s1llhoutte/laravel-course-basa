<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaa';
});

Route::get('/posts', 'App\Http\Controllers\PostController@index');
Route::get('/pets', 'App\Http\Controllers\PetController@index');
