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
        'TenSanPham',
        'GiaNhap',
        'GiaBan',
        'SoLuong',
        'MaNhaSanXuat',
        'MaDongSanPham',
        'HinhAnh',
        'MoTa'
    ];
    public function dongSanPham(){
        return $this->belongsTo(DongSanPham::class);
    }
    public function nhaSanXuat(){
        return $this->belongsTo('App\Models\NhaSanXuat','id');
    }
}
