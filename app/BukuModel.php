<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    public function tags(){
        return $this->hasMany('App\KategoriModel','kategori_id','id');
    }
    public $timestamps = false;
    protected $fillable =['judul','no_register','no_barcode','pengarang','penerbit','tahun_terbit','kategori_id'];
    protected $table = 'buku';
}
