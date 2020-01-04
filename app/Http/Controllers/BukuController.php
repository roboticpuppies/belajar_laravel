<?php

namespace App\Http\Controllers;

use App\BukuModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function kategori(){
        return $this->hasOne('App\KategoriModel');
    }
    public function index(){
        $buku = BukuModel::all();
        return view('buku.index', ['buku' => $buku]);
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
            'tahun_terbit'  => 'required'
        ]);

        BukuModel::create([
            'judul'         => $request->judul,
            'no_register'   => $request->no_register,
            'no_barcode'    => $request->no_barcode,
            'pengarang'     => $request->pengarang,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit
        ]);

        return redirect('/buku');
    }

    public function edit($id){
        $buku = BukuModel::find($id);
        return view('buku.edit', ['buku' => $buku]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'judul'         => 'required',
            'no_register'   => 'required',
            'no_barcode'    => 'required',
            'pengarang'     => 'required',
            'penerbit'      => 'required',
            'tahun_terbit'  => 'required'
        ]);
        $buku = BukuModel::find($id);
        $buku->judul         = $request->judul;
        $buku->no_register   = $request->no_register;
        $buku->no_barcode    = $request->no_barcode;
        $buku->pengarang     = $request->pengarang;
        $buku->penerbit      = $request->penerbit;
        $buku->tahun_terbit  = $request->tahun_terbit;
        $buku->save();
        return redirect('/buku');
    }

    public function delete($id){
        $buku = BukuModel::find($id);
        $buku->delete();
        return redirect('/buku');
    }
}
