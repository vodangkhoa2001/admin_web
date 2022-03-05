<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;
    protected $table="ram";
    public function sanPham(){
        return $this->hasMany('App\Models\SanPham');
    }
}
