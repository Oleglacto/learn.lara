<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 28.05.18
 * Time: 23:13
 */

namespace App\Http\Controllers;

use App\Models\Album;

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

//    public function getForm()
//    {
//        return view('createalbum');
//    }


}