@extends('components.master')

@section('judul_halaman', 'Pinjam Buku')

@section('content')

<form action="/admin/buku/fixpinjam" method="POST">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control" name="buku_id" value="{{ $buku->id }}">
            <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog" value="{{ $buku->judul }}" readonly>
        </div>
        <div class="form-group">
            <label for="siswa_id">Nama Peminjam</label>
            <select class="form-control" id="siswa_id" name="siswa_id">
            @foreach($user as $u)
                <option value="{{ $u->id }}">{{ $u->name }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control" name="buku_id" value="{{ $buku->id }}">
            <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog" value="{{ $buku->judul }}" readonly>
        </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection