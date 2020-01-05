@extends('components.master')

@section('judul_halaman', 'Home')

@section('content')
<h6>Selamat datang, <span class="text-primary">{{ Auth::user()->name }}</span>!</h6>
<br>
<div class="row">
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Pribadi</h5>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="/siswa/updatediri" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="name" placeholder="Nama" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="no_hp">No. HP</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nama" value="{{ Auth::user()->no_hp }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Update Data Diri</button>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalPassword">Ubah Password</button>
                </form>
            </div>
        </div>
    </div>
    @can('isSiswa')
    <div class="col-sm">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Buku Yang Harus Dikembalikan</h5>
                <p class="card-text">Coming Soon!</p>
            </div>
        </div>
    </div>
    @endcan
</div>

<!-- Modal Section -->
<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="modalPasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="/siswa/updatepassword" method="POST">
    {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="modalPasswordLabel">Ubah Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="password">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection