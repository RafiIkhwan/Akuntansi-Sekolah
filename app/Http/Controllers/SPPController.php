<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\SPP;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function index()
    {
        $data_spp = SPP::paginate(5);
        $no = ($data_spp->currentPage() - 1) * $data_spp->perPage() + 1;

        return view('admin.spp',[
            'spps'  => $data_spp,
            'no'    => $no,
        ]);
    }

    public function store(Request $request)
    {
        $tahunajar = $request->tahunajar;
        $spp = SPP::where('tahun_ajaran', $tahunajar)->first();
        $this->validate($request,[
            'tahunajar' => ['required', 'regex:/^[0-9]{4}\/[0-9]{4}$/'],
            'biaya'     => ['required'],
        ]);

        if($spp){
            return redirect()->back()->with('error', 'Gagal menambahkan, Data Tahun ajaran tersebut sudah ada');
        } else {
            SPP::create([
                'tahun_ajaran'  => $tahunajar,
                'biaya'         => $request->biaya,
            ]);

            return redirect()->back()->with('success', 'Berhasil menambahkan data SPP tahun '. $tahunajar);
        }
    }

    public function update($idspp, Request $request)
    {
        $this->validate($request,[
            'tahunajar' => ['required', 'regex:/^[0-9]{4}\/[0-9]{4}$/'],
            'biaya'     => ['required'],
        ]);

        $spp = SPP::find($idspp);
        $spp->biaya = $request->biaya;
        $spp->save();

        return redirect()->back()->with('edit', 'Data SPP berhasil diedit !');
    }

    public function delete($idspp)
    {
        $spp = SPP::find($idspp);
        $spp->delete();

        return redirect()->back()->with('edit', 'Data SPP berhasil dihapus !');
    }

    public function cari(Request $request)
    {
        $data_spp = SPP::where('tahun_ajaran', $request->cari)->paginate(5);
        $no = ($data_spp->currentPage() - 1) * $data_spp->perPage() + 1;

        return view('admin.spp',[
            'spps'  => $data_spp,
            'no'    => $no,
        ]);
    }
}
