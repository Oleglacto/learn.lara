<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 07.06.18
 * Time: 6:43
 */

namespace App\Services;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class StorageService
{

    /**
     * Storage file to filesystem
     * @param UploadedFile $file
     * @param $path
     * @param null $prefix
     * @return string
     */
    public function store(UploadedFile $file, $path, $prefix = null)
    {
        $fileName = $this->generateFileName($file, $path, $prefix);
        $file->move($path, $fileName);
        return $fileName;
    }

    /**
     * @param array $paths
     * @return bool
     */
    public function delete(array $paths)
    {
        File::delete($paths);
        return true;
    }


    /**
     * Generate file name with prefix + time + extension
     * @param UploadedFile $file
     * @param $path
     * @param null $prefix
     * @return string
     */
    protected function generateFileName(UploadedFile $file, $path, $prefix = null)
    {
        if (is_null($prefix)) {
            $prefix = explode('/', $path);
            $prefix = $prefix[count($prefix) - 2];
        }

        return $prefix . '_' . time() . '_' . str_random(3) . '.' . $file->getClientOriginalExtension();
    }
}