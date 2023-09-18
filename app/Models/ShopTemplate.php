<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['components', 'cssRule', 'html', 'css'];

    function shop(){
        return $this->belongsTo(Shop::class);
    }
}
