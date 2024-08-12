<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', '\App\Http\Controllers\Api\AuthController@register');
Route::post('login', '\App\Http\Controllers\Api\AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', '\App\Http\Controllers\Api\AuthController@logout');
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Api\V1\Admin', 'prefix' => 'v1',  'as'=>'api.', 'middleware' => ['auth:sanctum']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 
});