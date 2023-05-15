<?php

use App\Http\Controllers\DatabaseSiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Models\DatabaseSiswa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group(['middleware' => 'api', 'prefix'=> 'auth'], function($router){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::group(['middleware' => 'api', 'prefix'=> 'siswa'], function($router){
    Route::get('/index', [DatabaseSiswaController::class, 'index']);
    Route::post('/store', [DatabaseSiswaController::class, 'store']);
    Route::get('/show/{id}', [DatabaseSiswaController::class, 'show']);
    Route::put('/update', [DatabaseSiswaController::class, 'update']);
    Route::put('/update/{id}', [DatabaseSiswaController::class, 'update']);
    Route::delete('/destroy/{id}', [DatabaseSiswaController::class, 'destroy']);
});