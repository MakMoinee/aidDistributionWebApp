<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserAidsController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource("/", WelcomeController::class);
Route::resource("/user_home", UserHomeController::class);
Route::resource("/user_aids", UserAidsController::class);
Route::get("/logout", [LogoutController::class, 'index']);
