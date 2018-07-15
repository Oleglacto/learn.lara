<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 28.05.18
 * Time: 23:13
 */

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Jobs\DeleteAlbums;
use App\Models\Album;
use App\Models\Cake;
use App\Services\ImageService;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class AlbumsController extends Controller
{
    public function getList()
    {
        $albums = Album::with('Photos')->get();
        return $albums;
    }

    public function getAlbum($id)
    {
       $album = Album::with('Photos')->find($id);
       return $album;
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(AlbumRequest $request, Cake $cake)
    {
        $image = $request->file('cover_image');
        $storage = new StorageService();
        $fileName = $storage->store($image, Config::get('app.paths.coverAlbumOriginal'), 'album');
        $imageService = new ImageService();
        $resizeImage = $imageService->fit(Config::get('app.paths.coverAlbumOriginal'). $fileName, 360, 240);
        $imageService->store($resizeImage, Config::get('app.paths.coverAlbum') . $fileName);

        $cake->albums()->create([
            'name' => $request->name,
            'description' => $request->description,
            'cover_image' => Config::get('app.paths.coverAlbum'). $fileName,
            'cover_image_original' => Config::get('app.paths.coverAlbumOriginal') . $fileName
        ]);

        return back()->with([
            'flash_message' => 'Альбом добавлен'
        ]);
    }

    public function update(AlbumRequest $request, Cake $cake, Album $album)
    {
        $album->update($request->all());

        return back()->with([
            'flash_message' => 'Альбом успешно обновлен ^_^'
        ]);
    }

    public function find(Request $request, Album $album)
    {
        return response()->json($album);
    }

    public function destroy(Album $album)
    {
        DeleteAlbums::dispatch($album);
        return response()->json(['message' => 'Альбом удален']);
    }


}