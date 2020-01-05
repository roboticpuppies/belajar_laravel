@extends('components.master')

@section('judul_halaman', 'List User')

@section('content')
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalTambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah User</a>
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
          <th>Nama</th>
          <th>Email</th>
          <th>No. HP</th>
          <th>Role</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
      @foreach($users as $u)
      <tr>
          <td>{{ $u->name }}</td>
          <td>{{ $u->email }}</td>
          <td>{{ $u->no_hp }}</td>
          <td>{{ $u->role }}</td>
          <td>
              <a href="/admin/users/delete/{{ $u->id }}" class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i></a>
          </td>
      </tr>
      @endforeach
  </tbody>
</table>
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/admin/users/store" method="POST">
      <div class="modal-body">
      {{ csrf_field() }}
            <div class="form-group">
                <label for="judul">Nama</label>
                <input type="text" class="form-control" name="name" id="nama" placeholder="John Doe">
            </div>
            <div class="form-group">
                <label for="judul">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="admin@example.com">
            </div>
            <div class="form-group">
                <label for="no_hp">No. HP</label>
                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="+62123">
            </div>
            <div class="form-group">
                <label for="password">Nama</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" id="role" name="role">
                  <option value="admin">Admin</option>
                  <option value="siswa">Siswa</option>
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