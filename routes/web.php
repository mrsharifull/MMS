<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\admin\UserController;


Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

