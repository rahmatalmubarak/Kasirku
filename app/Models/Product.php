<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'capital_price',
        'sell_price',
        'stock_last',
    ];

    public function detailproduct(){
        return $this->hasOne(Product::class);
    }
    
}
