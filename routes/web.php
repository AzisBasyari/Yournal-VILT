<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::middleware('guest')->group(function() {
    Route::get('/', function () {
        return inertia('index');
    });
    
    Route::resource('/register', RegisterController::class)->only(['index', 'store']);
    Route::resource('/login', LoginController::class)->only(['index', 'store']);
});


Route::middleware('auth')->group(function() {
    Route::get('/home', HomeController::class);

    Route::resource('catatan', CatatanController::class);

    Route::resource('profile', ProfileController::class)->only(['index', 'store']);

    Route::post('/logout', [LoginController::class, 'destroy']);
});
