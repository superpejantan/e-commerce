<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    protected $table ='pesanan';
    public $primaryKey = 'id';
    public $incrementing = false;

    public function user()
    {
    	return $this->belongsTo('App\User', 'id_users', 'id_users');
    }

    public function status()
    {
    	return $this->belongsTo('App\Models\Status_invoice', 'id_status', 'id_status');
    }
    
}
