<?php

namespace App\Services;

use App\Jobs\DeleteAlbums;
use App\Models\Cake;
use Illuminate\Support\Facades\Log;

class CakeDelete
{
    protected $cake;

    public function __construct(Cake $cake)
    {
        $this->cake = $cake;
        $this->deleteMedia();
    }


    protected function deleteMedia() {

        $albums = $this->cake->albums()->get()->all();
        foreach ($albums as $album) {
            DeleteAlbums::dispatch($album);
        }
    }
}