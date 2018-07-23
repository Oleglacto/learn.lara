<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.07.18
 * Time: 22:35
 */

namespace App\Services;


use App\Jobs\DeleteImages;
use App\Models\Album;

class ImagesDelete
{
    protected $album;

    public function __construct(Album $album)
    {
        $this->album = $album;
        Log:info($this->album);
        $this->deleteImages();
    }


    protected function deleteImages() {

        DeleteImages::dispatch($this->album);
    }
}