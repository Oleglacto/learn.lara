<?php

namespace App\Models;


use App\Services\CakeDelete;
use Illuminate\Database\Eloquent\Model;

class Cake extends Model
{
    protected $fillable = [
        'name', 'weight', 'price', 'category_id', 'description', 'active'
    ];

    protected $table = 'cakes';

    public function albums()
    {
        return $this->hasMany('App\Models\Album');
    }

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'deleted' => CakeDelete::class,
    ];
}
