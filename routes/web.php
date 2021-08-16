<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\PermissionController;

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

require __DIR__.'/auth.php';

Route::prefix('admin')->name('admin')->group(function() {

    Route::prefix('users')->name('users.')->group(function(){

        Route::get('/', [UserController::class, 'index'] )->name('index');

    });

    Route::prefix('roles')->name('roles.')->group(function(){

        Route::get('/', [RoleController::class, 'index'] )->name('index');

    });

    Route::prefix('permissions')->name('permissions.')->group(function(){

        Route::get('/', [PermissionController::class, 'index'] )->name('index');

    });

});
