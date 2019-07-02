<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan_barang extends Model
{
    protected $table = 'Pesanan_barang';
    public $primaryKey = 'id_pesanan_brg';
    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo('App/Models/Barang','barang');
    }
}
