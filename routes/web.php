<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\PelangganController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [UserController::class, 'index']);

// ROUTE GOLONGAN
Route::get('/golongan', [GolonganController::class, 'index']);
Route::get('/golongan/create', [GolonganController::class, 'create']);
Route::post('/golongan/store', [GolonganController::class, 'store']);
Route::get('/golongan/edit/{id}', [GolonganController::class, 'edit']);
Route::patch('/golongan/edit/{id}', [GolonganController::class, 'update']);
Route::get('/golongan/delete/{id}', [GolonganController::class, 'destroy']);

// ROUTE PELANGGAN
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan/store', [PelangganController::class, 'store']);
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
Route::patch('/pelanggan/edit/{id}', [PelangganController::class, 'update']);
Route::get('/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);

