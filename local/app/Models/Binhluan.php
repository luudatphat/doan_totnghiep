<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
      protected $table='binhluan';
    
    protected $fillable = ['id','idsanpham','idnguoidung','tennguoidung','binhluan','danhgia'];
  
}
