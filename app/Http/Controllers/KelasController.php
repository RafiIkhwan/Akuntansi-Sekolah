<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
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
        $symbol = array('-', ',', '+', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '=', '{', '}', ']', '[', ';', ':', "'", '"', '<', '>', '.', '', '?');

        $formated = str_replace($symbol, ' ', $request->kelas);
        $trimmed = preg_replace('/\s+/', ' ', trim($formated));

        $kelas = Kelas::where('nama_kelas', $trimmed)->first();
        
        if($kelas){
            return redirect()->back()->with('error', 'Data kelas '. $trimmed .' sudah ada');
        } else{
            
             Kelas::create([
                'nama_kelas'            => $formated,
                'kompetensi_keahlian'   => $request->kk,
            ]);
            
            return redirect()->back()->with('success', 'Data Kelas Berhasil Ditambahkan!');    
        }
    }

    public function update($idkelas ,Request $request)
    {
        $this->validate($request,[
            'kelas'     => ['required'],
            'kk'        => ['required'],
        ]);
        $symbol = array('-', ',', '+', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '=', '{', '}', ']', '[', ';', ':', "'", '"', '<', '>', '.', '', '?');

        $formated = str_replace($symbol, ' ', $request->kelas);
        $trimmed = preg_replace('/\s+/', ' ', trim($formated));

        $kelas = Kelas::where('nama_kelas', $trimmed)->first();
        
        if($kelas){
            return redirect()->back()->with('error', 'Data kelas '. $trimmed .' sudah ada');
        } else{
            $kelas = Kelas::find($idkelas);
            $kelas->nama_kelas = $request->kelas;
            $kelas->kompetensi_keahlian = $request->kk;

            $kelas->save();

            return redirect()->back()->with('edit', 'Data Kelas Berhasil di Edit!');
        }
    }

    public function delete($idkelas)
    {
        $kelas = Kelas::find($idkelas);
        $kelas->delete();

        $siswa = Siswa::where('id_kelas', $idkelas)->get();
        foreach ($siswa as $s){
            $s->delete();
        }

        return redirect()->back()->with('success', 'Berhasil menghapus kelas');
        
    }

    public function restore()
    {
        Kelas::onlyTrashed()->restore();
        Siswa::onlyTrashed()->restore();

        return redirect('kelas')->with('success', 'Berhasil mengembalikan data kelas');
    }

    public function cari(Request $request)
    {
        $tbl_kelas = Kelas::where('nama_kelas', $request->cari)->paginate();
        $no = ($tbl_kelas->currentPage() - 1) * $tbl_kelas->perPage() + 1;

        return view('admin.kelas', [
            'data_kelas' => $tbl_kelas,
            'no'         => $no,
        ]);
    }
}
