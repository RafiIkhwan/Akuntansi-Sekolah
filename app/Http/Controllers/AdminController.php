<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AdminController extends Controller
{
    public function index()
    {
        $data_admin = Auth::user();

        return view('admin.profile', [
            'namapetugas'   => $data_admin->nama_admin,
            'email'         => $data_admin->email,
        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'namapetugas'   => ['required'],
            'email'         => ['required'],
        ]);
        $symbol = array('-', ',', '+', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '=', '{', '}', ']', '[', ';', ':', "'", '"', '<', '>', '.', '', '?');

        $formated = str_replace($symbol, ' ', $request->namapetugas);
        $trimmed = preg_replace('/\s+/', ' ', trim($formated));

        $email = $request->email;

        $data_admin = User::where('id_admin', Auth::user()->id_admin)->first();

        $data_admin->nama_admin = $trimmed;
        $data_admin->email = $email;

        $data_admin->save();

        return redirect()->back()->with('success', 'Profil berhasil di update !');
        
    }

    public function reset(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->back()->with('success', 'Password berhasil di edit !');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('edit', 'Akun berhasil dihapus, harap register kembali!');
    }

    public function table()
    {
        $data_petugas = User::paginate(5);
        $no = ($data_petugas->currentPage() - 1) * $data_petugas->perPage() + 1;


        return view('admin.petugas', [
            'data_petugas'  => $data_petugas,
            'no'            => $no,
        ]);
    }

    public function cari(Request $request)
    {
        $data_petugas = User::where('nama_admin', $request->cari)->paginate(5);
        $no = ($data_petugas->currentPage() - 1) * $data_petugas->perPage() + 1;


        return view('admin.petugas', [
            'data_petugas'  => $data_petugas,
            'no'            => $no,
        ]);
    }
}
