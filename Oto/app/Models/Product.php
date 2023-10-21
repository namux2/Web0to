<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail; // Import OrderDetail model

class Product extends Model
{
    protected $fillable = [
        'ten_xe',
        'hang_xe',
        'nam_san_xuat',
        'gia_ban',
        'noi_ban',
        'so_km',
        'ngay_ban',
        'mo_ta',
        'dong_xe',
        'nhien_lieu',
        'xuat_xu',
        'kieu_dang',
        'so_cho',
        'anh',
        'chi_tiet_anh',
        'dong_co',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
}
