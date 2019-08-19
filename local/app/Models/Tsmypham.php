<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tsmypham extends Model
{
     protected $table='tsmypham';
    
    protected $fillable = ['idthongso','thuonghieu','xuatxu','trongluong'];
    public $timestamps = false;
}
