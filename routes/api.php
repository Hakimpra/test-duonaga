<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukApiController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // Hanya admin yang boleh CRUD
    Route::middleware('admin')->group(function () {
        Route::post('/produk', [ProdukApiController::class, 'store']);
        Route::put('/produk/{id}', [ProdukApiController::class, 'update']);
        Route::delete('/produk/{id}', [ProdukApiController::class, 'destroy']);
    });


    Route::post('/logout', [AuthController::class, 'logout']);
});

    // Semua user bisa melihat produk
    Route::get('/produk', [ProdukApiController::class, 'index']);
    Route::get('/produk/{id}', [ProdukApiController::class, 'show']);