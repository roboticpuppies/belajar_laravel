@extends('components.master')

@section('judul_halaman', 'Daftar VCD')

@section('content')
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah VCD</a>
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
          <th>Judul VCD</th>
          <th>Register</th>
          <th>Penerbit</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($vcd as $b)
      <tr>
          <td>{{ $b->judul }}</td>
          <td>{{ $b->no_register }}</td>
          <td>{{ $b->penerbit }}</td>
          <td>
            <div class="btn-group" role="group">
              <button id="btnAction" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnAction">
                <a class="dropdown-item" href="/admin/vcd/edit/{{ $b->id }}">Edit</a>
                <a class="dropdown-item" href="/admin/vcd/delete/{{ $b->id }}">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah VCD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/vcd/store" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
            <div class="form-group">
                <label for="judul">Judul VCD</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="The quick brown fox jumps over the lazy dog">
            </div>
            <div class="form-group">
                <label for="no_register">No. Register</label>
                <input type="text" class="form-control" name="no_register" id="no_register" placeholder="004.6 SIA P">
            </div>
            <div class="form-group">
                <label for="penerbit">Nama Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Marvel">
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