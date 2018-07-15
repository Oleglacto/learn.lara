<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['name', 'description', 'cover_image', 'cover_image_original'];

    public function photos()
    {
        return $this->hasMany('App\Models\Images');
    }

    public function cake()
    {
        return $this->belongsTo('App\Models\Cake');
    }
}
