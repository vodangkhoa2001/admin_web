<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DongSanPham extends Model
{
    use HasFactory;
    protected $table="dongsanpham";
    protected $fillable = [
        'TenDongSanPham',
    ];
    public function sanPham(){
        return $this->hasMany('App\Models\SanPham');
    }
}
