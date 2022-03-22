<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MauSac;
use App\Models\Cpu;
use App\Models\OCung;
use App\Models\ManHinh;
use App\Models\CardDoHoa;
use App\Models\DongSanPham;

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
    public static function productSearch($keyword, $paginate){
        return SanPham::where('TensanPham', 'like', '%' . $keyword . '%')->paginate($paginate, ['*'], 'pp');
    }
    public function dongSanPham(){
        return $this->belongsTo(DongSanPham::class,'MaDongSanPham','id');
    }
    public function nhaSanXuat(){
        return $this->belongsTo('App\Models\NhaSanXuat','MaNhaSanXuat','id');
    }
    public function mauSac(){
        return $this->belongsTo(MauSac::class,'MaMau','id');
    }
    public function RAM(){
        return $this->belongsTo('App\Models\Ram','MaRam','id');
    }
    public function CPU(){
        return $this->belongsTo(CPU::class,'MaCPU','id');
    }
    public function ManHinh(){
        return $this->belongsTo(ManHinh::class,'MaManHinh','id');
    }
    public function OCung(){
        return $this->belongsTo(Ocung::class,'MaOCung','id');
    }
    public function cardDoHoa(){
        return $this->belongsTo(CardDoHoa::class,'MaCardDoHoa','id');
    }
}
