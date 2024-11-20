<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

// Route::get('/dashboard', function () {
//   return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Backend : Admin Panel
Route::group([ 'namespace'=> '\App\Http\Controllers\Admin', 'prefix' => 'admin',  'as'=>'admin.', 'middleware' => 'auth' ], function () {
  // Route::get('/', function () {
  //   return redirect(route('admin.dashboard'));
  // });

  //naming convention ignored for dashboard as /admin/dashboards sounds inappropriate!
  // Route::get('/dashboard', 'DashboardController@index')->name('dashboard'); // check prefix

  Route::resource('products', 'ProductController'); 
  Route::resource('permissions', 'PermissionController'); 
  Route::resource('roles', 'RoleController'); 
  Route::resource('users', 'UserController'); 
});

//Frontend
Route::group([ 'namespace'=> '\App\Http\Controllers', 'prefix' => '',  'as'=>'', 'middleware' => 'auth' ], function () { 
  Route::resource('products', 'ProductController'); 
});