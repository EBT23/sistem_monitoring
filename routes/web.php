<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KomoditiController;
use App\Http\Controllers\RekapanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StatusPengusahaanController;
use App\Http\Controllers\TahunController;

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
        Route::get('/chart','chartData')->name('chart.index');
        Route::get('/areachart','areachartData')->name('chart.area');
    });
    
    Route::get('/provinsi', [ProvinsiController::class, 'provinsi'])->name('provinsi.index');
    Route::post('/add-provinsi', [ProvinsiController::class, 'add_provinsi'])->name('add.provinsi');
    Route::post('/updateprovinsi/{id}', [ProvinsiController::class, 'update_provinsi'])->name('update.provinsi');
    Route::delete('/deleteprovinsi/{id}', [ProvinsiController::class, 'delete_provinsi'])->name('delete.provinsi');
    
    Route::get('/kabupaten', [KabupatenController::class, 'index'])->name('kabupaten.index');
    Route::post('/add-kabupaten', [KabupatenController::class, 'add_kabupaten'])->name('add.kabupaten');
    Route::post('/updatekabupaten/{id}', [KabupatenController::class, 'update_kabupaten'])->name('update.kabupaten');
    Route::delete('/deletekabupaten/{id}', [KabupatenController::class, 'delete_kabupaten'])->name('delete.kabupaten');
    
    
    Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::post('/add-kecamatan', [KecamatanController::class, 'add_kecamatan'])->name('add.kecamatan');
    Route::post('/updatekecamatan/{id}', [KecamatanController::class, 'update_kecamatan'])->name('update.kecamatan');
    Route::delete('/deletekecamatan/{id}', [KecamatanController::class, 'delete_kecamatan'])->name('delete.kecamatan');
    
    Route::get('/status_pengusahaan', [StatusPengusahaanController::class, 'index'])->name('status_pengusahaan.index');
    Route::post('/add-status_pengusahaan', [StatusPengusahaanController::class, 'add_status_pengusahaan'])->name('add.status_pengusahaan');
    Route::post('/updatestatus_pengusahaan/{id}', [StatusPengusahaanController::class, 'update_status_pengusahaan'])->name('update.status_pengusahaan');
    Route::delete('/deletestatus_pengusahaan/{id}', [StatusPengusahaanController::class, 'delete_status_pengusahaan'])->name('delete.status_pengusahaan');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::post('/add-user', [UserController::class, 'add_user'])->name('add.user');
    Route::post('/updateuser/{id}', [UserController::class, 'update_user'])->name('update.user');
    Route::delete('/deleteuser/{id}', [UserController::class, 'delete_user'])->name('delete.user');
    
    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('/add-role', [RoleController::class, 'add_role'])->name('add.role');
    Route::post('/updaterole/{id}', [RoleController::class, 'update_role'])->name('update.role');
    Route::delete('/deleterole/{id}', [RoleController::class, 'delete_role'])->name('delete.role');
    
    Route::get('/semester', [SemesterController::class, 'index'])->name('semester.index');
    Route::post('/add-semester', [SemesterController::class, 'add_semester'])->name('add.semester');
    Route::post('/updatesemester/{id}', [SemesterController::class, 'update_semester'])->name('update.semester');
    Route::delete('/deletesemester/{id}', [SemesterController::class, 'delete_semester'])->name('delete.semester');
    
    Route::get('/komoditi', [KomoditiController::class, 'index'])->name('komoditi.index');
    Route::post('/add-komoditi', [KomoditiController::class, 'add_komoditi'])->name('add.komoditi');
    // Route::post('/updatekomoditi/{id}', [KomoditiController::class, 'update_komoditi'])->name('update.komoditi');
    Route::resource('update_komoditi', KomoditiController::class);
    Route::delete('/deletekomoditi/{id}', [KomoditiController::class, 'delete_komoditi'])->name('delete.komoditi');
    
    Route::get('/tahun', [TahunController::class, 'index'])->name('tahun.index');
    Route::post('/add-tahun', [TahunController::class, 'add_tahun'])->name('add.tahun');
    Route::post('/updatetahun/{id}', [TahunController::class, 'update_tahun'])->name('update.tahun');
    Route::delete('/deletetahun/{id}', [TahunController::class, 'delete_tahun'])->name('delete.tahun');

    Route::get('/rekapan', [RekapanController::class, 'index'])->name('rekapan.index');
    Route::get('/acc_rekapan/{id}', [RekapanController::class, 'acc'])->name('rekapan.acc');
    Route::get('/batalkan_rekapan/{id}', [RekapanController::class, 'batalkan'])->name('rekapan.batalkan');
    Route::get('/tolak_rekapan/{id}', [RekapanController::class, 'tolak'])->name('rekapan.tolak');
});
