<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PermissionController;


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

// User Routes
Route::group(['as' => 'user.', 'prefix' => '/user'], function () {
    Route::get('/view', [UserController::class, 'index'])->name('view');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('delete');

});

// User Role Routes
Route::group(['as' => 'role.', 'prefix' => '/user/role'], function () {
    Route::get('/view', [RoleController::class, 'index'])->name('view');
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::post('/store', [RoleController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
});

// User Permission Routes
Route::group(['as' => 'permission.', 'prefix' => '/user/permission'], function () {
    Route::get('/view', [PermissionController::class, 'index'])->name('view');

    // Route::get('/permission/add', [UserController::class, 'permission_add'])->name('users.permission.add');
    // Route::post('/permission/store', [UserController::class, 'permission_store'])->name('users.permission.store');
    // Route::get('/permission/view', [UserController::class, 'permission_view'])->name('permission.index');
    // Route::get('/permission/add', [UserController::class, 'permission_add'])->name('permission.add');
    // Route::post('/permission/store', [UserController::class, 'permission_store'])->name('permission.store');
    // Route::get('/permission/details/{id}', [UserController::class, 'permission_details'])->name('permission.details');
    // Route::get('/permission/edit/{id}', [UserController::class, 'permission_edit'])->name('permission.edit');
    // Route::post('/permission/edit-store', [UserController::class, 'permission_edit_store'])->name('permission.edit.store');
    // Route::get('/permission/delete/{id}', [UserController::class, 'permission_delete'])->name('permission.delete');
});






