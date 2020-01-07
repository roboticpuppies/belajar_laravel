<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeminjamanModel;
use App\User;
use Auth;
use DB;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function pinjamanku()
    {
        $siswa_id = Auth::user()->id;
        $peminjaman = DB::table('peminjaman')
                        ->join('users', 'peminjaman.siswa_id', '=', 'users.id')
                        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
                        ->select('peminjaman.id', 'users.name', 'buku.judul', 'peminjaman.tanggal_pinjam', 'peminjaman.deadline_pengembalian')
                        ->where('peminjaman.siswa_id', '=', $siswa_id)
                        ->get();

        return view('siswa.pinjamanku', compact('peminjaman'));
    }

    public function updatediri(Request $request)
    {
        $siswa_id = Auth::user()->id;
        $this->validate($request,[
            'name'          => 'required',
            'no_hp'         => 'required',
        ]);
        $updatediri = User::find($siswa_id);
        $updatediri->name         = $request->name;
        $updatediri->no_hp        = $request->no_hp;
        $updatediri->save();
        return redirect('/home')->with('status', 'Sukses!');
    }

    public function updatepassword(Request $request)
    {
        $siswa_id = Auth::user()->id;
        $this->validate($request,[
            'password'         => 'required'
        ]);
        $updatepassword = User::find($siswa_id);
        $updatepassword->password         = \Hash::make($request->password);
        $updatepassword->save();
        return redirect('/home')->with('status', 'Sukses!');
    }
}
