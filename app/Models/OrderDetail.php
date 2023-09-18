<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function order(){
        $this->belongsTo(Order::class);
    }

    public function product(){
        $this->belongsTo(Product::class);
    }

    public function shop(){
        $this->belongsTo(Shop::class);
    }
}
