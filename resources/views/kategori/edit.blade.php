@extends('components.master')

@section('judul_halaman', 'Edit Kategori')

@section('content')

<form action="/admin/kategori/update/{{ $kategori->id }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="form-group">
            <label for="nama_kategori">Judul Kategori</label>
            <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Fiction" value="{{ $kategori->nama_kategori }}">
        </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection