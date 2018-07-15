<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 13.06.18
 * Time: 6:24
 */

namespace App\Http\Controllers;


use App\Models\Album;
use App\Models\Cake;
use App\Models\Images;
use App\Services\ImageService;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class ImagesController extends Controller
{
    public function list(Cake $cake, Album $album)
    {

        $images = $album->photos()->get()->all();
        return view('gallery.list')->with(compact('images', 'album', 'cake'));
    }

    public function store(Cake $cake, Album $album, Request $request)
    {
        $storage = new StorageService();
        $imageService = new ImageService();
        foreach ($request->images as $image) {
            $fileName = $storage->store($image, Config::get('app.paths.coverImageOriginal'), 'image');
            $resizeImage = $imageService->fit(Config::get('app.paths.coverImageOriginal'). $fileName, 360, 240);
            $imageService->store($resizeImage, Config::get('app.paths.coverImage') . $fileName);
            $images = new Images();
            $images->create([
                'album_id' => $album->id,
                'image' => Config::get('app.paths.coverImage') . $fileName,
                'image_original' => Config::get('app.paths.coverImageOriginal') . $fileName,
            ]);
        }

        return back()->with([
            'flash_message' => 'Изображения добавлены'
        ]);
    }

    public function destroy(Images $image)
    {
        $storage = new StorageService();

        try {
            if ($storage->delete([$image->image, $image->image_original])) {
                $image->delete();
            }
        } catch (\Exception $e) {

        }

        return back()->with([
            'flash_message' => 'Альбом удален'
        ]);
    }
}