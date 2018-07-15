<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 07.06.18
 * Time: 6:52
 */

namespace App\Services;


use Intervention\Image\Facades\Image;

class ImageService
{

    public function resize($path, $width, $height = null)
    {
        if (is_null($height)) {
            $height = $width;
        }
        $image = Image::make($path)->resize($width, $height);

        return $image;

    }

    public function crop()
    {

    }

    public function fit($path, $width, $height = null)
    {
        if (is_null($height)) {
            $height = $width;
        }
        $image = Image::make($path)->fit($width, $height);

        return $image;
    }

    public function store(\Intervention\Image\Image $image, $path)
    {
        return $image->save($path);
    }
}