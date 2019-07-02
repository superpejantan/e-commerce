<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    protected $table = "kota";

    protected $fillable = ['id','name','id_province'];
}
