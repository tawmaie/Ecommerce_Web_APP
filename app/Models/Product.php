<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'stock', 
        'price'
    ];

    function type(){
        return $this->belongsTo(Type::class);
    }
    function shop(){
        return $this->belongsTo(Shop::class);
    }
    function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
