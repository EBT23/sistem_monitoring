<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;

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
    return view('auth.login');
});

Route::controller(AuthController::class)->group( function (){
    Route::get('/login','login')->name('login');
    Route::post('login','login_action')->name('login.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::controller(AdminController::class)->group( function (){
        Route::get('/dashboard','index')->name('index');
    });
    
    Route::get('/provinsi', [ProvinsiController::class, 'provinsi'])->name('provinsi.index');
    Route::post('/add-provinsi', [ProvinsiController::class, 'add_provinsi'])->name('add.provinsi');
    Route::post('/updateprovinsi/{id}', [ProvinsiController::class, 'update_provinsi'])->name('update.provinsi');
    Route::delete('/deleteprovinsi/{id}', [ProvinsiController::class, 'delete_provinsi'])->name('delete.provinsi');
    
    Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten.index');
    Route::post('/add-kabupaten', [KabupatenController::class, 'add_kabupaten'])->name('add.kabupaten');
    Route::post('/updatekabupaten/{id}', [KabupatenController::class, 'update_kabupaten'])->name('update.kabupaten');
    Route::delete('/deletekabupaten/{id}', [KabupatenController::class, 'delete_kabupaten'])->name('delete.kabupaten');
    

});