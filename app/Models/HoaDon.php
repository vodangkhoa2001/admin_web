<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    //set id tu int thành string 
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table="hoadon";
    public static function billSearch($keyword){
        return SanPham::where('MaTaiKhoan', 'like', '%' . $keyword . '%');
    }
    public function taiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'MaTaiKhoan','id');
    }
}
