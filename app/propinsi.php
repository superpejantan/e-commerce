<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class propinsi extends Model
{
    protected $table = "propinsi";
    
    protected $fillable = ['id','name'];
}
