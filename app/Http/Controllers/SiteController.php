<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.04.18
 * Time: 23:04
 */

namespace App\Http\Controllers;


class SiteController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        return view('site.index');
    }
}