<?php

namespace App\Http\Controllers;

use App\VCDModel;
use Illuminate\Http\Request;

class VCDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $vcd = VCDModel::all();
        return view('vcd.index', ['vcd' => $vcd]);
    }

    public function tambah(){
        return view('vcd.tambah');
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul'         => 'required',
            'no_register'   => 'required',
            'penerbit'      => 'required'
        ]);

        VCDModel::create([
            'judul'         => $request->judul,
            'no_register'   => $request->no_register,
            'penerbit'      => $request->penerbit
        ]);

        return redirect('/admin/vcd')->with('status', 'Sukses!');
    }

    public function edit($id){
        $vcd = VCDModel::find($id);
        return view('vcd.edit', ['vcd' => $vcd]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'judul'         => 'required',
            'no_register'   => 'required',
            'penerbit'      => 'required'
        ]);
        $vcd = VCDModel::find($id);
        $vcd->judul         = $request->judul;
        $vcd->no_register   = $request->no_register;
        $vcd->penerbit      = $request->penerbit;
        $vcd->save();
        return redirect('/admin/vcd')->with('status', 'Sukses!');
    }

    public function delete($id){
        $vcd = VCDModel::find($id);
        $vcd->delete();
        return redirect('/admin/vcd')->with('status', 'Sukses!');
    }
}
