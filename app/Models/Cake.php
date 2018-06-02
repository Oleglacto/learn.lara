<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name', 'weight', 'price', 'category_id', 'description', 'active'
    ];
    //
    protected $table = 'cakes';
}
