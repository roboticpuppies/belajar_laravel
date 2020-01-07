@extends('components.master')

@section('judul_halaman', 'List Kategori')

@section('content')
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Kategori</a>
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
          <th>Nama Kategori</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($kategori as $b)
      <tr>
          <td>{{ $b->nama_kategori }}</td>
          <td>
            <div class="btn-group" role="group">
              <button id="btnAction" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnAction">
                <a class="dropdown-item" href="/admin/kategori/edit/{{ $b->id }}">Edit</a>
                <a class="dropdown-item" href="/admin/kategori/delete/{{ $b->id }}">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/kategori/store" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
            <div class="form-group">
                <label for="judul">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Fiction">
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