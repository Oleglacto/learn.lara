<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.04.18
 * Time: 23:34
 */

namespace App\Http\Controllers;

/*
 * TODO
 * ЧЕ то сделать
 */

use App\Models\Cake;
use App\Models\Category;

class AdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('administration.index', compact('cake'));
    }

    public function products()
    {

        $cakes = Cake::all();
        $categories = Category::all();

        if ($category = request('category')) {
            $cakes = $cakes->where('category_id', $category);
        }


        return view('administration.products', compact('cakes','categories'));
    }

}