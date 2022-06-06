<?php

use Illuminate\Support\Facades\Route;
use Laratrust\Http\Controllers\PermissionsController;
use Laratrust\Http\Controllers\RolesController;
use Laratrust\Http\Controllers\RolesAssignmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/permissions', 'PermissionsController', ['as' => 'laratrust'])
    ->only(['index', 'create', 'store', 'edit', 'update']);

Route::resource('/roles', 'RolesController', ['as' => 'laratrust']);

Route::resource('/roles-assignment', 'RolesAssignmentController', ['as' => 'laratrust'])
    ->only(['index', 'edit', 'update']);

require __DIR__.'/auth.php';