<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::group([ 'namespace'=> '\App\Http\Controllers', 'prefix' => '',  'as'=>'', 'middleware' => 'auth' ], function () { 
  Route::resource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('products', 'ProductController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers', 'prefix' => '',  'as'=>'', 'middleware' => 'auth' ], function () { 
  Route::resource('projects', 'ProjectController'); 
});

Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () { 
  Route::resource('projects', 'ProjectController'); 
});