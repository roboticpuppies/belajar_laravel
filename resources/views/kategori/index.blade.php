@extends('components.master')

@section('judul_halaman', 'List Kategori')

@section('content')
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Kategori</a>
<br>
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
              <a href="/kategori/edit/{{ $b->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
              <a href="/kategori/delete/{{ $b->id }}" class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i> Hapus</a>
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
      <form action="/kategori/store" method="POST">
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
<pre>
<?php var_dump($kategori) ?>
</pre>
@endsection