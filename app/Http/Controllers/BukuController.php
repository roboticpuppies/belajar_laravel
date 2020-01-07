<?php

namespace App\Http\Controllers;

use App\BukuModel;
use App\KategoriModel;
use App\User;
use App\PeminjamanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function kategori(){
        return $this->hasOne('App\KategoriModel');
    }
    public function index(){
        $buku = BukuModel::all();
        $categorylist = KategoriModel::all();
        return view('buku.index', compact('buku', 'categorylist'));
    }

    public function tambah(){
        return view('buku.tambah');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul'         => 'required',
            'no_register'   => 'required',
            'no_barcode'    => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required',
            'kategori_id'  => 'required'
        ]);

        BukuModel::create([
            'judul'         => $request->judul,
            'no_register'   => $request->no_register,
            'no_barcode'    => $request->no_barcode,
            'pengarang'     => $request->pengarang,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'kategori_id'  => $request->kategori_id
        ]);

        return redirect('/admin/buku')->with('status', 'Sukses!');
    }

    public function fixpinjam(Request $request)
    {
        $datenow = Carbon::now()->toDateTimeString();
        $deadline = Carbon::now()->addDays(7)->toDateTimeString();
        $this->validate($request,[
            'siswa_id'         => 'required',
            'buku_id'          => 'required',
        ]);

        PeminjamanModel::create([
            'siswa_id'         => $request->siswa_id,
            'buku_id'          => $request->buku_id,
            'tanggal_pinjam'        => $datenow,
            'deadline_pengembalian' => $deadline
        ]);
        return redirect('/admin/buku')->with('status', 'Sukses!');
    }

    public function edit($id){
        $buku = BukuModel::find($id);
        $categorylist = KategoriModel::all();
        return view('buku.edit', compact('buku','categorylist'));
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'judul'         => 'required',
            'no_register'   => 'required',
            'no_barcode'    => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required',
            'kategori_id'  => 'required'
        ]);
        $buku = BukuModel::find($id);
        $buku->judul         = $request->judul;
        $buku->no_register   = $request->no_register;
        $buku->no_barcode    = $request->no_barcode;
        $buku->pengarang     = $request->pengarang;
        $buku->penerbit      = $request->penerbit;
        $buku->tahun_terbit  = $request->tahun_terbit;
        $buku->kategori_id   = $request->kategori_id;
        $buku->save();
        return redirect('/admin/buku')->with('status', 'Sukses!');
    }

    public function delete($id){
        $buku = BukuModel::find($id);
        $buku->delete();
        return redirect('/admin/buku')->with('status', 'Sukses!');
    }

    public function pinjam($id){
        $buku = BukuModel::find($id);
        $user = User::all();
        return view('buku.pinjam', compact('buku','user'));
    }

    public function peminjaman()
    {
        $peminjaman = DB::table('peminjaman')
                        ->join('users', 'peminjaman.siswa_id', '=', 'users.id')
                        ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
                        ->select('peminjaman.id', 'users.name', 'buku.judul', 'peminjaman.tanggal_pinjam', 'peminjaman.deadline_pengembalian')
                        ->get();

        return view('buku.peminjaman', compact('peminjaman'));
    }
}
