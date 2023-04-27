<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SPP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $tbl_siswa = Siswa::paginate(5);
        $tbl_spp   = SPP::all();
        $tbl_kelas = Kelas::all();
        $no = ($tbl_siswa->currentPage() - 1) * $tbl_siswa->perPage() + 1;

        return view('admin.siswa', [
            'data_siswa' => $tbl_siswa,
            'no' => $no,
            'data_spp' => $tbl_spp,
            'data_kelas' => $tbl_kelas,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nis'       => ['required', 'max:10'],
            'nisn'      => ['required', 'max:10'],
            'namasiswa' => ['required'],
            'idspp'     => ['required'],
            'kelas'     => ['required'],
            'alamat'    => ['required'],
            'nohp'      => ['required'],
        ]);

        Siswa::create([
            'nis'       => $request->nis,
            'nisn'      => $request->nisn,
            'nama_siswa'=> $request->namasiswa,
            'id_spp'    => $request->idspp,
            'id_kelas'  => $request->kelas,
            'alamat'    => $request->alamat,
            'hp'        => $request->nohp,
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        return redirect()->back()->with('success', 'Data Siswa berhasil ditambahkan !');
    }

    public function update($idsiswa, Request $request)
    {
        $this->validate($request,[
            'nis'       => ['required', 'max:10'],
            'nisn'      => ['required', 'max:10'],
            'namasiswa' => ['required'],
            'idspp'     => ['required'],
            'kelas'     => ['required'],
            'alamat'    => ['required'],
            'nohp'      => ['required'],
        ]);

        $siswa = Siswa::find($idsiswa);
        $siswa->nis        = $request->nis;
        $siswa->nisn       = $request->nisn;
        $siswa->nama_siswa = $request->namasiswa;
        $siswa->id_spp     = $request->idspp;
        $siswa->id_kelas   = $request->kelas;
        $siswa->alamat     = $request->alamat;
        $siswa->hp         = $request->nohp;

        $siswa->save();
        
        return redirect()->back()->with('edit', 'Data Siswa berhasil diedit !');
    }

    public function delete($idsiswa)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->delete();

        return redirect()->back();
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
    
        $table_siswa = Siswa::where('nama_siswa','like',"%".$cari."%")->paginate(5);
        $date = date("d M Y - H:m");
        $no = ($table_siswa->currentPage() - 1) * $table_siswa->perPage() + 1;
        $tbl_spp   = SPP::all();
        $tbl_kelas = Kelas::all();

        return view('admin.siswa', [
            'data_siswa' => $table_siswa,
            'date'  => $date,
            'no'    => $no,
            'data_spp' => $tbl_spp,
            'data_kelas' => $tbl_kelas,
        ]);
    }


}
