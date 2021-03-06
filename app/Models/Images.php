<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = ['album_id', 'image', 'image_original'];

    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }
}
