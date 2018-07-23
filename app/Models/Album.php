<?php

namespace App\Models;

use App\Services\ImagesDelete;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = ['name', 'description', 'cover_image', 'cover_image_original'];

    public function images()
    {
        return $this->hasMany('App\Models\Images');
    }

    public function cake()
    {
        return $this->belongsTo('App\Models\Cake');
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => ImagesDelete::class,
    ];
}
