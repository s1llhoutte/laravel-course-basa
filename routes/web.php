<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaa';
});

Route::get('/my-page', 'App\Http\Controllers\MyPlaceController@index');
