<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::post('register', '\App\Http\Controllers\Api\AuthController@register');
// Route::post('login', '\App\Http\Controllers\Api\AuthController@login');

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/logout', '\App\Http\Controllers\Api\AuthController@logout');
// });

Route::post('v1/register', '\App\Http\Controllers\Api\V1\AuthController@register');
Route::post('v1/login', '\App\Http\Controllers\Api\V1\AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('v1/logout', '\App\Http\Controllers\Api\V1\AuthController@logout');
});