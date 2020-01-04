<?php

namespace App\Http\Controllers;

use App\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $kategori = KategoriModel::all();
        return view('kategori.index', ['kategori' => $kategori]);
    }

    public function tambah(){
        return view('kategori.tambah');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_kategori'         => 'required'
        ]);

        KategoriModel::create([
            'nama_kategori'         => $request->nama_kategori
        ]);

        return redirect('/kategori');
    }

    public function edit($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['kategori' => $kategori]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'nama_kategori'         => 'required'
        ]);
        $kategori = KategoriModel::find($id);
        $kategori->nama_kategori         = $request->nama_kategori;
        $kategori->save();
        return redirect('/kategori');
    }

    public function delete($id){
        $kategori = KategoriModel::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}
