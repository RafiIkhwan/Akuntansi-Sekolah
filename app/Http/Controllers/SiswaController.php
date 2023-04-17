<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function index()
    {
        $tbl_siswa = Siswa::paginate(5);
        $no = ($tbl_siswa->currentPage() - 1) * $tbl_siswa->perPage() + 1;

        return view('admin.siswa', [
            'data_siswa' => $tbl_siswa,
            'no' => $no,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nis'       => ['required', 'max:10'],
            'namasiswa' => ['required'],
            'kelas'     => ['required'],
            'hp'        => ['required'],
        ]);

        Siswa::create([
            'nis'       => $request->nis,
            'namasiswa' => $request->namasiswa,
            'kelas'     => $request->kelas,
            'hp'        => $request->hp,
            'created_at'=> Carbon::now(),
            'updated_at'=> null
        ]);

        return redirect()->back()->with('success', 'Data Siswa berhasil ditambahkan !');
    }

    public function update($idsiswa,Request $request)
    {
        $this->validate($request,[
            'nis'       => ['required', 'max:10'],
            'namasiswa' => ['required'],
            'kelas'     => ['required'],
            'hp'        => ['required'],
        ]);

        $siswa = Siswa::find($idsiswa);
        $siswa->nis      =$request->nis;
        $siswa->namasiswa=$request->namasiswa;
        $siswa->kelas    =$request->kelas;
        $siswa->hp       =$request->hp;

        $siswa->save();
        
        return redirect()->back()->with('edit', 'Data Siswa berhasil diedit !');
    }

    public function delete($idsiswa)
    {
        $tbl_siswa = Siswa::find($idsiswa);
        $tbl_siswa->delete();

        return redirect()->back();
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
    
        $table_siswa = Siswa::where('nama_siswa','like',"%".$cari."%")->paginate();
        $date = date("d M Y - H:m");

        return view('admin.siswa', [
            'data_siswa' => $table_siswa,
            'date'  => $date,
        ]);
    }


}
