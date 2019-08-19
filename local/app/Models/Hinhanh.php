<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    protected $table='hinhanh';
    
    protected $fillable = ['id','img','idsanpham'];
    public $timestamps = false;
}
