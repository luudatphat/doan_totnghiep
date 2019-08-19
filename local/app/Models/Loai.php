<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loai extends Model
{
     protected $table='loai';
   
    protected $fillable = ['id','ma','ten'];
}
