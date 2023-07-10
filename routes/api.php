<?php

use App\Http\Controllers\api\ApiAllController;
use App\Http\Controllers\api\ApiAuthController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [ApiAuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [ApiAuthController::class, 'logout']);
    Route::get('/me', [ApiAuthController::class, 'me']);
    Route::get('/provinsi', [ApiAllController::class, 'provinsi']);
    Route::get('/kabupaten', [ApiAllController::class, 'kabupaten']);
    Route::get('/kecamatan', [ApiAllController::class, 'kecamatan']);
    Route::get('/komoditi', [ApiAllController::class, 'komoditi']);
    Route::get('/status_pengusahaan_tanaman', [ApiAllController::class, 'status_pengusahaan_tanaman']);
    Route::get('/tahun', [ApiAllController::class, 'tahun']);
    Route::get('/semester', [ApiAllController::class, 'semester']);
    Route::get('/rekapan', [ApiAllController::class, 'rekapan']); 
    Route::post('/tambah_rekapan', [ApiAllController::class, 'tambah_rekapan']); 
});
