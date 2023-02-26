<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PenjualControllers\categoricontroller;
use App\Http\Controllers\PenjualControllers\MenumakananController;
use App\Http\Controllers\PenjualControllers\MenuminumanController;
use App\Http\Controllers\ProfileController;

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

Route::view('/zep', 'zep');
Route::get('/', function () {
    return view('landinguser.home.index');
});

Route::get('/beranda',[BerandaController::class, 'beranda']);
//kategori
Route::get('/kategori',[categoricontroller::class, 'index']);
Route::post('/kategoripost',[categoricontroller::class, 'post']);
Route::post('/kategoriedit/{id}',[categoricontroller::class, 'edit']);
Route::get('/kategoridestroy/{id}',[categoricontroller::class, 'destroy']);
//menu makanan
Route::get('/menu-makanan',[MenumakananController::class,"index"]);
Route::post('/menu-makananpost',[MenumakananController::class,"post"]);
Route::post('/menu-makananedit/{id}',[MenumakananController::class,"edit"]);
Route::get('/menu-makanandelete/{id}',[MenumakananController::class,"destroy"]);
//menu minuman
Route::get('/menu-minuman',[MenuminumanController::class,"index"]);
Route::post('/menu-minumanpost',[MenuminumanController::class,"post"]);
Route::post('/menu-minumanedit/{id}',[MenuminumanController::class,"edit"]);
Route::get('/menu-minumandelete/{id}',[MenuminumanController::class,"destroy"]);
//Profile
Route::get('/profile',[ProfileController::class, 'profile']);

