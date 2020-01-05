@extends('components.master')

@section('judul_halaman', 'Pinjamanku')

@section('content')
<p>Untuk meminjam buku, silahkan meminjam melalui perpustakaan. Halaman ini digunakan untuk melihat daftar buku yang sedang Anda pinjam.</p>
<br>
<br>
<table class="table table-bordered table-hover table-striped">
  <thead>
      <tr>
          <th>Judul Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Deadline Pengembalian</th>
      </tr>
  </thead>
  <tbody>
      @foreach($peminjaman as $p)
      <tr>
          <td>{{ $p->judul }}</td>
          <td>{{ Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y') }}</td>
          <td>{{ Carbon\Carbon::parse($p->deadline_pengembalian)->format('d/m/Y') }}</td>
      </tr>
      @endforeach
  </tbody>
</table>
@endsection