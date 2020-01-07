<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    public $timestamps = false;
    protected $table = 'peminjaman';
    protected $dates = ['tanggal_pinjam', 'deadline_pengembalian'];
    protected $fillable =['siswa_id', 'buku_id', 'tanggal_pinjam', 'deadline_pengembalian'];
}
