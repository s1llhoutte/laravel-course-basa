<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['namespace' => 'App\Http\Controllers\Post', 'middleware' => ['jwt.auth']], function () {
    Route::get('/posts', 'IndexController');
    Route::get('/posts/create', 'CreateController');
    Route::post('/posts', 'StoreController');
    Route::get('/posts/{post}', 'ShowController');
    Route::get('/posts/{post}/edit', 'EditController');
    Route::patch('/posts/{post}', 'UpdateController');
    Route::delete('/posts/{post}', 'DestroyController');
});
