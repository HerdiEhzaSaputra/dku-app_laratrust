<?php

use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', \App\Http\Livewire\Users\Index::class)->name('users.index');
    Route::get('/users/create', \App\Http\Livewire\Users\Create::class)->name('users.create');
    Route::get('/users/edit/{id}', \App\Http\Livewire\Users\Edit::class)->name('users.edit');

});


require __DIR__.'/auth.php';
