<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status_invoice extends Model
{
    protected $table ='status_invoice';
    public $primaryKey = 'id_status';
    public $timestamps = false;
}
