<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SPP;
use App\Models\Transaksi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    
    public function index()
    {
        $tbl_admin = User::all();
        $date = date("d M Y - H:m");

        return view('admin.pembayaran', [
            'data_admin'=> $tbl_admin,
            'data_siswa'=> null,
            'data_tahun' => SPP::all(),
            'bulan' => ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            'cari'      => null,
            'date'      => $date, 
            'no' => 1,
        ]);
    }

    public function cari(Request $request)
    {
        $cari   = $request->idsiswa;
        $tahun  = $request->thnajaran;

        $data_siswa =  Siswa::where(function ($query) use ($cari) {
            $query->where('nis', $cari)
                  ->orWhere('nisn', $cari);
        })
        ->whereHas('spp', function ($query) use ($tahun) {
            $query->where('tahun_ajaran', 'LIKE', '%' . $tahun . '%');
        });
        
        if (!$data_siswa->first()) {
            return redirect('pembayaran')->withInput()->with('error', 'Siswa dengan NIS/N ' . $cari . ' tidak ditemukan di Tahun Ajaran ' . $tahun);
        }
        
        $data_siswa = $data_siswa->get();

        foreach($data_siswa as $siswa){
           $id_siswa = $siswa->id_siswa;
        }

        $tbl_transaksi = Transaksi::where('id_siswa', $id_siswa)->get();
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $no = 1;


        return view('admin.pembayaran', [
            'data_siswa' => $data_siswa,
            'data_tahun' => SPP::all(),
            'bulan'     => $bulan,
            'data_transaksi' => $tbl_transaksi,
            'cari' => $cari,
            'no' => $no,
        ]);
    }

    
    public function table()
    {
        $tbl_transaksi = Transaksi::paginate(5);
        $no = ($tbl_transaksi->currentPage() - 1) * $tbl_transaksi->perPage() + 1;
        $date = date("d M Y - H:m");

        return view('admin.transaksi', [
            'data_transaksi'=> $tbl_transaksi,
            'no'            => $no,
            'date'          => $date, 
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'idsiswa'       => ['required'],
            'idadmin'       => ['required'],
            'tanggal'       => ['required'],
            'totalbayar'    => ['required'],
            'bulan'         => ['required'],
        ]);

        $kembali = NULL;
        $siswa = Siswa::where('id_siswa', $request->idsiswa)->first();
        $id_spp = $siswa->id_spp;

        $spp = SPP::where('id_spp', $id_spp)->first();
        $transaksi = Transaksi::where('bulan', $request->bulan)->where('id_siswa', $request->idsiswa)->latest()->first();

        if($transaksi){
            if($transaksi->sisa_bayar != NULL){
                $sisabayar = $transaksi->sisa_bayar - $request->totalbayar;
                if($transaksi->sisa_bayar < 0){
                    $sisabayar = $transaksi->sisa_bayar - $request->totalbayar;
                    $kembali = abs($sisabayar);
                    $sisabayar = 0;
                }
            }
        }
        else{
            $sisabayar = $spp->biaya - $request->totalbayar;
        }

        Transaksi::create([
            'id_siswa'      => $request->idsiswa,
            'id_admin'      => $request->idadmin,
            'tanggal'       => $request->tanggal,
            'total_bayar'   => $request->totalbayar,
            'sisa_bayar'    => $sisabayar,
            'kembali'       => $kembali,
            'bulan'         => $request->bulan,
            'created_at'    => Carbon::now(),
            'updated_at'    => null
        ]);

        
        return redirect()->back()->with('success', 'Transaksi berhasil ditambahkan !');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'idsiswa'       => ['required'],
            'idadmin'       => ['required'],
            'tanggal'       => ['required'],
            'totalbayar'    => ['required'],
            'bulan'         => ['required'],
        ]);

        $idsiswa        = $request->idsiswa;
        $oldbulan       = $request->oldbulan;

        $data_transaksi = Transaksi::where('bulan', $oldbulan)->where('id_siswa', $idsiswa)->get();
      
        foreach($data_transaksi as $transaksi){
   
            $transaksi->bulan = $request->bulan;
            $transaksi->tanggal = $request->tanggal;
            
            $transaksi->save();
        }

        
        return redirect()->back()->with('edit', 'Data transaksi berhasil diedit !');
    }

    // public function kembali($idtransaksi)
    // {
    //     $tbl_transaksi = transaksi::find($idtransaksi);
    //     $tbl_transaksi->delete();

    //     return redirect()->back()->with('kembali', 'Berhasil Mengembalikan barang !');
    // }

    // public function pengembalian()
    // {
    //     $tbl_transaksi = transaksi::onlyTrashed()->get();
    //     $tbl_petugas = Petugas::all();
    //     $date = date("d M Y - H:m");

    //     return view('admin.transaksi.pengembalian', ['datas' => $tbl_transaksi, 'admins' => $tbl_petugas, 'date' => $date]);
    // }
    public function delete(Request $request)
    {
        $idsiswa        = $request->idsiswa;
        $oldbulan       = $request->oldbulan;

        $data_transaksi = Transaksi::where('bulan', $oldbulan)->where('id_siswa', $idsiswa)->get();
      
        foreach($data_transaksi as $transaksi){
            $transaksi->forceDelete();
        }

        return redirect()->back()->with('hapus', 'Data Pengembalian Berhasil di Hapus');
    }
}
