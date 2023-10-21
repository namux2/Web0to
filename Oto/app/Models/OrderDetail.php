<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;  

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Quan hệ với bảng Đơn Hàng
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}
