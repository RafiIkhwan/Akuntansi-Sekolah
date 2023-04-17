<?php

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

    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('loginaksi', [LoginController::class, 'loginaksi'])->name('loginaksi');
    Route::post('loginstore', [LoginController::class, 'loginStore'])->name('loginStore');

    Route::middleware('auth')->group(function () {
    
        Route::get('logoutaksi', [LoginController::class, 'logoutaksi'])->name('logoutaksi');
        Route::get('home', [DashboardController::class, 'index'])->name('home');

        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');
        Route::get('/siswa/cari', [SiswaController::class, 'cari'])->name('siswaCari');
        
        Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
        Route::post('kelas/store', [KelasController::class, 'store'])->name('kelasStore');
        Route::post('kelas/update/{idkelas}', [KelasController::class, 'update'])->name('kelasUpdate');
        Route::get('kelas/delete/{idkelas}', [KelasController::class, 'delete'])->name('kelasDelete');

        Route::get('/pembayaran',  [TransaksiController::class, 'index'])->name('pembayaran');
        Route::get('/pembayaran/cari',  [TransaksiController::class, 'cari'])->name('pembayaranCari');
        Route::get('/transaksi',  [TransaksiController::class, 'table'])->name('transaksi');
        Route::post('/transaksi/store',  [TransaksiController::class, 'store'])->name('transaksiStore');
        Route::post('/transaksi/update',  [TransaksiController::class, 'update'])->name('transaksiUpdate');
        Route::post('/transaksi/hapus',  [TransaksiController::class, 'delete'])->name('transaksiHapus');
    }); 

});
// Route::get('/transaksi/add', [TransaksiController::class, 'crudadd']);
// Route::get('/transaksi/store', [TransaksiController::class, 'crudstore'])->name('crudStore');