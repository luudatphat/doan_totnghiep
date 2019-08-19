<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table='hoadon';
   
    protected $fillable = ['id','ma','idnguoidung','tennguoidung','idnguoiban','trangthai','tennguoidat','email','diachi','tongitenchuathue','thue','tongtien'];
}
