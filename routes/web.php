<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'aaa';
});

Route::get('/my-page', function () {
    return 'this is my page';
});
