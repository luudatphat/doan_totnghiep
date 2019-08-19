<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    //
    protected $table='nguoidung';
   
    protected $fillable = [
        'username', 'email', 'password','ten','sdt','tenshop','avatar',
    ];
     protected $hidden = [
        'password', 'remember_token',
    ];
}
