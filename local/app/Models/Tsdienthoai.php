<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsdienthoai extends Model
{
    protected $table='tsdienthoai';
    
    protected $fillable = ['idthongso','cameratruoc','camerasau','bonhotrong'];
    public $timestamps = false;
}
