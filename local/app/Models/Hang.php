<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hang extends Model
{
      protected $table='hang';
    
    protected $fillable = ['id','idloai','ma','ten'];
    public $timestamps = false;
}
