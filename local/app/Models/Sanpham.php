<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table='sanpham';
    
    protected $fillable = ['id','ma','ten','avatar','gia','mota','idnguoidung','idloai','idhang'];

     
}
