<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\categoricontroller;

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

Route::get('/', function () {
    return view('landinguser.home.index');
});

Route::get('/beranda',[BerandaController::class, 'beranda']);
Route::get('/kategori',[categoricontroller::class, 'index']);

//Profile
Route::get('/profile',[ProfileController::class, 'profile']);


///login
Route::get('/login',[LoginController::class, 'login']);
Route::get('/register',[LoginController::class, 'register']);
Route::post('/postlogin',[LoginController::class, 'postlogin']);
Route::post('/postregister',[LoginController::class, 'postregister']);

