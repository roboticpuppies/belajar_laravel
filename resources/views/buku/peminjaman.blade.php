@extends('components.master')

@section('judul_halaman', 'Daftar Peminjaman Buku')

@section('content')
<table class="table table-bordered table-hover table-striped">
  <thead>
      <tr>
          <th>Judul Buku</th>
          <th>Peminjam</th>
          <th>Tanggal Pinjam</th>
          <th>Deadline Pengembalian</th>
      </tr>
  </thead>
  <tbody>
      @foreach($peminjaman as $p)
      <tr>
          <td>{{ $p->judul }}</td>
          <td>{{ $p->name }}</td>
          <td>{{ Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y') }}</td>
          <td>{{ Carbon\Carbon::parse($p->deadline_pengembalian)->format('d/m/Y') }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection