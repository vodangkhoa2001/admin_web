<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SanPham extends Model
{
    use HasFactory;
    use SoftDeletes;
    //set id tu int thành string 
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table="sanpham";
    //setprotected $guarded=[];
    protected $fillable = [
        'MaDongSanPham',
        'TenSanPham',
        'GiaNhap',
        'GiaBan',
        'SoLuong',
        'MaNhaSanXuat',
        'HinhAnh',
        'MoTa',
    ];
    public function dongSanPham(){
        return $this->belongsTo(DongSanPham::class);
    }
    public function nhaSanXuat(){
        return $this->belongsTo(NhaSanXuat::class);
    }
}
