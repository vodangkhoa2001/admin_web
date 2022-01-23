<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;

class TaiKhoan extends Authentication
{
    use HasFactory;
    //set id tu int thành string 
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';


    protected $table="taikhoan";
}
