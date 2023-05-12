<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TransaksiController;
use App\Models\Siswa;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web'], function () {

    // Halaman Login
    Route::get('/', [LoginController::class, 'login'])->name('login');

    // Auth Attempt
    Route::post('/loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');

    // Register
    Route::post('/loginstore', [LoginController::class, 'loginStore'])->name('loginStore');


    // Auth URL
    Route::middleware('auth')->group(function () {
    
        // Logout
        Route::get('/logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi');

        // Dashboard
        Route::get('/home', [DashboardController::class, 'index'])->name('home');

        Route::middleware(['role:Admin'])->group(function ()
        {

            Route::prefix('/siswa')->group(function ()
            {
                Route::get('/', [SiswaController::class, 'index'])->name('siswa');
                Route::post('/store', [SiswaController::class, 'store'])->name('siswaStore');
                Route::post('/update/{idsiswa}', [SiswaController::class, 'update'])->name('siswaUpdate');
                Route::post('/delete/{idsiswa}', [SiswaController::class, 'delete'])->name('siswaDelete');
                Route::get('/cari', [SiswaController::class, 'cari'])->name('siswaCari');
            });
            
            Route::get('/restore', [KelasController::class, 'restore'])->name('kelasRestore');
            
            Route::prefix('/kelas')->group(function () 
            {
                Route::get('/', [KelasController::class, 'index'])->name('kelas');
                Route::post('/store', [KelasController::class, 'store'])->name('kelasStore');
                Route::post('/update/{idkelas}', [KelasController::class, 'update'])->name('kelasUpdate');
                Route::post('/delete/{idkelas}', [KelasController::class, 'delete'])->name('kelasDelete');
                Route::get('/cari', [KelasController::class, 'cari'])->name('kelasCari');
            });
            
            Route::prefix('/petugas')->group(function () 
            {
                Route::get('/', [AdminController::class, 'index'])->name('petugas');
            });
        });
            
        Route::prefix('/profile')->group(function () 
        {
            Route::get('/', [AdminController::class, 'index'])->name('profile');
            Route::post('/update', [AdminController::class, 'update'])->name('profileUpdate');
            Route::post('/reset', [AdminController::class, 'reset'])->name('profileReset');
            Route::post('/delete', [AdminController::class, 'delete'])->name('profileDelete');
        });

        Route::prefix('/pembayaran')->group(function ()
        {
            Route::get('/',  [TransaksiController::class, 'index'])->name('pembayaran');
            Route::get('/cari',  [TransaksiController::class, 'cari'])->name('pembayaranCari');
            Route::post('/store',  [TransaksiController::class, 'store'])->name('pembayaranStore');
            Route::post('/update',  [TransaksiController::class, 'update'])->name('pembayaranUpdate');
            Route::post('/hapus',  [TransaksiController::class, 'delete'])->name('pembayaranHapus');
        });

        Route::get('/transaksi',  [TransaksiController::class, 'table'])->name('transaksi');
    }); 

});