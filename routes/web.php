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


        // Section Siswa 

        // Tampil Data ( Read )
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa');

        // Tambah Data ( Create )
        Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswaStore');

        // Edit Data ( Edit )
        Route::post('/siswa/update/{idsiswa}', [SiswaController::class, 'update'])->name('siswaUpdate');

        // Hapus Data ( Delete )
        Route::post('/siswa/delete/{idsiswa}', [SiswaController::class, 'delete'])->name('siswaDelete');

        // Fitur        
        Route::get('/siswa/cari', [SiswaController::class, 'cari'])->name('siswaCari');
        Route::get('/restore', [KelasController::class, 'restore'])->name('kelasRestore');
        Route::get('/kelas/cari', [KelasController::class, 'cari'])->name('kelasCari');

        // Section Kelas
        
        // Tampil Data ( Read )
        Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');

        // Tambah Data ( Create )
        Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelasStore');

        // Edit Data ( Edit )
        Route::post('/kelas/update/{idkelas}', [KelasController::class, 'update'])->name('kelasUpdate');

        // Delete Data ( Delete )
        Route::post('/kelas/delete/{idkelas}', [KelasController::class, 'delete'])->name('kelasDelete');



        Route::get('/pembayaran',  [TransaksiController::class, 'index'])->name('pembayaran');
        Route::get('/pembayaran/cari',  [TransaksiController::class, 'cari'])->name('pembayaranCari');
        Route::get('/transaksi',  [TransaksiController::class, 'table'])->name('transaksi');
        Route::post('/transaksi/store',  [TransaksiController::class, 'store'])->name('transaksiStore');
        Route::post('/transaksi/update',  [TransaksiController::class, 'update'])->name('transaksiUpdate');
        Route::post('/transaksi/hapus',  [TransaksiController::class, 'delete'])->name('transaksiHapus');
    }); 

});