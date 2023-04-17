<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $tbl_kelas = Kelas::paginate(5);
        $no = ($tbl_kelas->currentPage() - 1) * $tbl_kelas->perPage() + 1;
        return view('admin.kelas', [
            'data_kelas' => $tbl_kelas,
            'no'         => $no,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'kelas'     => ['required'],
            'kk'        => ['required'],
        ]);

        Kelas::create([
            'nama_kelas'            => $request->kelas,
            'kompetensi_keahlian'   => $request->kk,
        ]);

        return redirect()->back()->with('success', 'Data Kelas Berhasil Ditambahkan!');
    }

    public function update($idkelas ,Request $request)
    {
        $this->validate($request,[
            'kelas'     => ['required'],
            'kk'        => ['required'],
        ]);

        $kelas = Kelas::find($idkelas);
        $kelas->nama_kelas = $request->kelas;
        $kelas->kompetensi_keahlian = $request->kk;

        $kelas->save();

        return redirect()->back()->with('edit', 'Data Kelas Berhasil di Edit!');
    }

    public function delete($idkelas)
    {
        $kelas = Kelas::find($idkelas);
        $kelas->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus kelas');
        
    }
}
