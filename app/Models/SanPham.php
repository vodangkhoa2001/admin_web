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
        'MaMau',
        'MaManHinh',
        'MaRam',
        'MaCPU',
        'MaCardDoHoa',
        'MaOCung',
        'MaDongSanPham',
        'HinhAnh',
        'MoTa',
        'TrangThai'
    ];
    public function dongSanPham(){
        return $this->belongsTo(DongSanPham::class);
    }
    public function nhaSanXuat(){
        return $this->belongsTo(NhaSanXuat::class);
    }
    public function mauSac(){
        return $this->belongsTo(MauSac::class);
    }
    public function RAM(){
        return $this->belongsTo(RAM::class);
    }
    public function CPU(){
        return $this->belongsTo(CPU::class);
    }
    public function ManHinh(){
        return $this->belongsTo(ManHinh::class);
    }
    public function OCung(){
        return $this->belongsTo(Ocung::class);
    }
    public function cardDoHoa(){
        return $this->belongsTo(NhaSanXuat::class);
    }
}
