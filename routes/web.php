<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\RoleController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Users\ProfileController;
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
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

    });

    Route::prefix('roles')->name('roles.')->group(function(){

        Route::get('/', [RoleController::class, 'index'] )->name('index');
        Route::get('/create', [RoleController::class, 'create'])->name('create');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');

    });

    Route::prefix('permissions')->name('permissions.')->group(function(){

        Route::get('/', [PermissionController::class, 'index'] )->name('index');
        Route::get('/create', [PermissionController::class, 'create']);
        Route::post('/store', [PermissionController::class, 'store']);
        Route::get('/edit/{id}', [PermissionController::class, 'edit']);
        Route::post('/update/{id}', [PermissionController::class, 'update']);

    });

    

});

Route::prefix('users')->name('users')->group(function() {

    Route::prefix('profile')->name('profile.')->group(function(){

        Route::get('/', [ProfileController::class, 'index'] )->name('index');
        Route::get('/create', [ProfileController::class, 'create']);
        Route::post('/store', [ProfileController::class, 'store']);
        Route::get('/edit/{id}', [ProfileController::class, 'edit']);
        Route::post('/update/{id}', [ProfileController::class, 'update']);

    });
});
