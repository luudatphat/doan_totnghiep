<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tslaptop extends Model
{
    protected $table='tslaptop';
    
    protected $fillable = ['idthongso','hedieuhanh','cpu','ram','ocung','manhinh','carddohoa','pin','trongluong'];
    public $timestamps = false;
}
