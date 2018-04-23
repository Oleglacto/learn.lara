<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.04.18
 * Time: 23:04
 */

namespace App\Http\Controllers;


class TestController extends Controller
{
    public function index()
    {
        dd(request()->all());
    }
}