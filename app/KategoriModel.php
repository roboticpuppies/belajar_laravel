<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    public $timestamps = false;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function books(){
        return $this->belongsTo('App\BukuModel');
    }
}
