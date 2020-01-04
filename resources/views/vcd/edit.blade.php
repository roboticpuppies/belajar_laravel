@extends('components.master')

@section('judul_halaman', 'Edit VCD')

@section('content')

<form action="/vcd/update/{{ $vcd->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="judul">Judul VCD</label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog" value="{{ $vcd->judul }}">
        </div>
        <div class="form-group">
            <label for="no_register">No. Register</label>
            <input type="text" class="form-control" name="no_register" id="no_register" placeholder="004.6 SIA P" value="{{ $vcd->no_register }}">
        </div>
        <div class="form-group">
            <label for="penerbit">Nama Penerbit</label>
            <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Marvel" value="{{ $vcd->penerbit }}">
        </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection