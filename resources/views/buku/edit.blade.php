@extends('components.master')

@section('judul_halaman', 'Edit Buku')

@section('content')

<form action="/admin/buku/update/{{ $buku->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog" value="{{ $buku->judul }}">
        </div>
        <div class="form-group">
            <label for="no_register">No. Register</label>
            <input type="text" class="form-control" name="no_register" id="no_register" placeholder="004.6 SIA P" value="{{ $buku->no_register }}">
        </div>
        <div class="form-group">
            <label for="no_barcode">No. Barcode</label>
            <input type="text" class="form-control" name="no_barcode" id="no_barcode" placeholder="04578/PB/12" value="{{ $buku->no_barcode }}">
        </div>
        <div class="form-group">
            <label for="pengarang">Nama Pengarang</label>
            <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="John Doe" value="{{ $buku->pengarang }}">
        </div>
        <div class="form-group">
            <label for="penerbit">Nama Penerbit</label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Marvel" value="{{ $buku->penerbit }}">
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="text" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="2012" value="{{ $buku->tahun_terbit }}">
        </div>
        <div class="form-group">
              <label for="categorylist">Kategori</label>
              <select class="form-control" id="categorylist" name="kategori_id">
                @foreach($categorylist as $c)
                    @if($buku->kategori_id == $c->id)
                    <option value="{{ $c->id }}" selected>{{ $c->nama_kategori }}</option>
                    @else
                    <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
                    @endif
                @endforeach
              </select>
            </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection