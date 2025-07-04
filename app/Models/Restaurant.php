<?php
// app/Models/Restaurant.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'description', 'location', 'logo', 'is_active'];
}
