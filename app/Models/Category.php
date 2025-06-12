<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_Id'; // Custom PK
protected $fillable = ['restaurant_id', 'name', 'image', 'status'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
