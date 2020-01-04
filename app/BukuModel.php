<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    public $timestamps = false;
    protected $table = 'buku';
    protected $fillable =['judul','no_register','no_barcode','pengarang','penerbit','tahun_terbit','kategori_id'];

    public function category(){
        return $this->hasOne('App\KategoriModel', 'id', 'kategori_id');
    }
}
