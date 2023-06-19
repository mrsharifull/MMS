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
Route::get('/user/view', [UserController::class, 'index'])->name('user.view');
Route::get('/role/view', [RoleController::class, 'index'])->name('role.view');
Route::get('/permission/view', [PermissionController::class, 'index'])->name('permission.view');

