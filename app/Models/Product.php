<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='products';
    protected $primaryKey = 'product_id';
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
    public function restaurant(){
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }


}
