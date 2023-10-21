<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail; 

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'dia_chi',
        'ghi_chu',
    ];

    // Quan hệ với bảng Chi Tiết Đơn Hàng
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}