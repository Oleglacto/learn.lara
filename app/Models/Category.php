<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function cakes()
    {
        return $this->hasMany(Cake::class);
    }
}
