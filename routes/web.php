<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

Route::get("/", [PageController::class, 'welcome']);

// store
Route::get("/home/{name}", [MenuController::class, 'home']);
Route::post('/store-menu', [MenuController::class, 'store']);

// user-register
Route::get("/register", [UserController::class, 'register_page']);
Route::post("/register", [UserController::class, 'register']);

// user-login
Route::get("/login", [UserController::class, 'login_page']);
Route::post("/login", [UserController::class, 'login']);

// logout
Route::post('/logout', [UserController::class, 'logout']);

// home
Route::post('/photo', [MenuController::class, 'handle_photo']);