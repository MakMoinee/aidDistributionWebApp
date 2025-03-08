<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserAidsController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\UserDonationsController;
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
Route::resource("/user_donations", UserDonationsController::class); 
Route::get("/logout", [LogoutController::class, 'index']);
Route::resource("/user_details", UserDetailsController::class);
Route::post('/receive-funds', [UserAidsController::class, 'receiveFunds'])->name('receiveFunds');