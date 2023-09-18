<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    function user() {
        return $this->belongsTo(User::class ,'user_id');
    }

    function products(){
        return $this->hasMany(Product::class);
    }

    function types(){
        return $this->hasMany(Type::class);
    }

    function shopTemplate(){
        return $this->hasOne(ShopTemplate::class);
    }

    function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
