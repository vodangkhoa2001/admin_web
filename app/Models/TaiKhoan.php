<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authentication;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class TaiKhoan extends Authentication
{
   use HasApiTokens, HasFactory, Notifiable;

    //set id tu int thành string
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    // protected $fillable = ['TenDangNhap'];
    protected $fillable = [
        'TenDangNhap',
        'Email',
        'MatKhau',
        'SDT',
        'DiaChi',
        'HoTen',
        'HinhAnh',
    ];
    protected $table="taikhoan";
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
