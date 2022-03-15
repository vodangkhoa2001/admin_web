<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
use App\Models\TaiKhoan;

class DanhGia extends Model
{
    use HasFactory;
    protected $table="danhgia";
    public function sanPham(){
        return $this->belongsTo(SanPham::class,'MaSanPham','id');
    }
    public function taiKhoan(){
        return $this->belongsTo(TaiKhoan::class,'MaTaiKhoan','id');
    }
}
