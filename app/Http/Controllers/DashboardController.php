<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('transaksi')->first();

        $sisa_bayar = Transaksi::select('id_siswa', DB::raw('SUM(sisa_bayar) as sisa_bayar'))
        ->groupBy('id_siswa')
        ->get();

        $transaksi = Siswa::whereNotIn('id_siswa', $sisa_bayar->pluck('id_siswa'))
        ->orWhere(function($query) use ($sisa_bayar){
            $query->whereIn('id_siswa', $sisa_bayar->where('sisa_bayar', '>', 0)->pluck('id_siswa'));
        })
        ->get();

        $data = [
            'data_siswa'        => Siswa::all(),
            'data_kelas'        => Kelas::all(),
            'data_transaksi'    => Transaksi::whereMonth('tanggal', Carbon::now()->month)->get(),
            'transaksi'         => $transaksi,
            'total'             => number_format(Transaksi::sum('total_bayar') + Transaksi::where('sisa_bayar', '<', 0)->sum('sisa_bayar'), 0, ',', '.'),
            'belum_lunas'       => $siswa,
        ];

        return view('admin.dashboard', $data);
    }
}
