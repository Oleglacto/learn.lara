<?php

namespace App\Services;

use App\Jobs\DeleteAlbums;
use App\Models\Cake;

class CakeDelete
{
    protected $cake;

    public function __construct(Cake $cake)
    {
        $this->cake = $cake;
        $this->deleteAlbums();
    }


    protected function deleteAlbums() {

        $albums = $this->cake->albums()->get()->all();
        foreach ($albums as $album) {
            DeleteAlbums::dispatch($album);
        }
    }
}