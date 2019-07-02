<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table = "pelanggan";
    public $primary = "id_pelanggan";
    public $timestamps ="false"; 

    public function rekening()
    {
        return $this->belongsTo('App\pembayaran', 'rekening');
    }
}
