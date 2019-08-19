<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thongso extends Model
{
    protected $table='thongso';
    
    protected $fillable = ['id','idloai','idsanpham'];
    public $timestamps = false;
}
