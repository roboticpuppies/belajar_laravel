<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VCDModel extends Model
{
    public $timestamps = false;
    protected $fillable =['judul','no_register','penerbit'];
    protected $table = 'vcd';
}
