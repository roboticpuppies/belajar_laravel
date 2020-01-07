@extends('components.master')

@section('judul_halaman', 'Daftar Buku')

@section('content')
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Buku</a>
<br>
<br>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<br>
<table class="table table-bordered table-hover table-striped">
  <thead>
      <tr>
          <th>Judul Buku</th>
          <th>Register</th>
          <th>Barcode</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Tahun Terbit</th>
          <th>Kategori</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($buku as $b)
      <tr>
          <td>{{ $b->judul }}</td>
          <td>{{ $b->no_register }}</td>
          <td>{{ $b->no_barcode }}</td>
          <td>{{ $b->pengarang }}</td>
          <td>{{ $b->penerbit }}</td>
          <td>{{ $b->tahun_terbit }}</td>
          <td>
            {{ $b->category->nama_kategori }}
          </td>
          <td>
            <div class="btn-group" role="group">
              <button id="btnAction" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnAction">
                <a class="dropdown-item" href="/admin/buku/edit/{{ $b->id }}">Edit</a>
                <a class="dropdown-item" href="/admin/buku/delete/{{ $b->id }}">Delete</a>
                <a class="dropdown-item" href="/admin/buku/pinjam/{{ $b->id }}">Pinjam</a>
              </div>
            </div>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/buku/store" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog">
            </div>
            <div class="form-group">
                <label for="no_register">No. Register</label>
                <input type="text" class="form-control" name="no_register" id="no_register" placeholder="004.6 SIA P">
            </div>
            <div class="form-group">
                <label for="no_barcode">No. Barcode</label>
                <input type="text" class="form-control" name="no_barcode" id="no_barcode" placeholder="04578/PB/12">
            </div>
            <div class="form-group">
                <label for="pengarang">Nama Pengarang</label>
                <input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="John Doe">
            </div>
            <div class="form-group">
                <label for="penerbit">Nama Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Marvel">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="2012">
            </div>
            <div class="form-group">
              <label for="categorylist">Kategori</label>
              <select class="form-control" id="categorylist" name="kategori_id">
                @foreach($categorylist as $c)
                  <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
                @endforeach
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection