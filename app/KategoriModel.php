<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama_kategori'];
    protected $table = 'kategori';

    public function buku(){
        return $this->belongsTo('App\BukuModel');
    }
}
