<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table="khuyenmai";
    protected $fillable = [
        'MaSanPhamKhuyenMai',
        'DonGiaKhuyenMai',
        'MoTa',
        'SoLuongKhuyenMai',
        'NgayBatDau',
        'NgayKetThuc',
    ];
    public function sanPham(){
        return $this->belongsTo('App\Models\SanPham','MaSanPhamKhuyenMai','id');
    }
}
