<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('register', '\App\Http\Controllers\Api\AuthController@register');
// Route::post('login', '\App\Http\Controllers\Api\AuthController@login');

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('/logout', '\App\Http\Controllers\Api\AuthController@logout');
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//   return $request->user();
// });

// Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {
//   Route::post('register', 'AuthController@register');
//   Route::post('login', 'AuthController@login');

//   Route::group(['middleware' => ['auth:api']], function () {
//     Route::post('/logout', 'AuthController@logout');
//   });
// });

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::post('v1/register', '\App\Http\Controllers\Api\V1\AuthController@register');
Route::post('v1/login', '\App\Http\Controllers\Api\V1\AuthController@login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('v1/logout', '\App\Http\Controllers\Api\V1\AuthController@logout');
});

//Backend (/admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api\V1\Admin', 'prefix' => 'v1/admin',  'as'=>'v1.admin.', 'middleware' => ['auth:sanctum']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 

  Route::get('/permissions/search/{name}', 'PermissionController@search')->name('permissions.search'); 
  Route::apiResource('permissions', 'PermissionController'); 

  Route::get('/roles/search/{name}', 'RoleController@search')->name('roles.search'); 
  Route::apiResource('roles', 'RoleController'); 

  Route::get('/users/search/{title}', 'UserController@search')->name('users.search'); 
  Route::apiResource('users', 'UserController'); 
});

//Frontend (no /admin prefix)
Route::group([ 'namespace'=> '\App\Http\Controllers\Api\V1', 'prefix' => 'v1/',  'as'=>'v1.', 'middleware' => ['auth:sanctum']], function () { 
  Route::get('/products/search/{title}', 'ProductController@search')->name('products.search'); 
  Route::apiResource('products', 'ProductController'); 
});