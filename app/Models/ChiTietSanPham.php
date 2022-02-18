<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietSanPham extends Model
{
    use HasFactory;
    protected $table="chitietsanpham";
    protected $fillable = [
        'MaSanPham',
        'MauSac',
        'Ram',
        'OCung',
        'ManHinh',
        'CardDoHoa',
        'MoTa',
        'TrangThai_ChiTietSanPham'
    ];
    public function sanPham(){
        return $this->belongsTo(SanPham::class);
    }
}
