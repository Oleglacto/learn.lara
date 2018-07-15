<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakeRequest;
use App\Models\Cake;
use App\Models\Category;

class CakeController extends Controller
{
    public function create()
    {
        $category = Category::all();
        $categoryIdValue = [];
        foreach ($category as $item) {
            $categoryIdValue[$item->id] = $item->name;
        }

        return view('administration.single-product', compact('category', 'categoryIdValue'));
    }

    public function edit(Cake $cake)
    {
        $category = Category::all();
        $categoryIdValue = [];
        $albums = $cake->albums()->get()->all();
        foreach ($category as $item) {
            $categoryIdValue[$item->id] = $item->name;
        }

        return view('administration.single-product', compact('cake', 'category', 'categoryIdValue', 'albums'));
    }

    /**
     * Созданин тортика
     * @param CakeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CakeRequest $request)
    {
        Cake::create($request->all());

        return redirect('admin/products')->with([
            'flash_message' => 'Тортик успешнно добавлен :)'
        ]);

    }

    public function update(CakeRequest $request, Cake $cake)
    {
        $cake->update($request->all());

        return back()->with([
            'flash_message' => 'Тортик успешно обновлен ^_^'
        ]);


    }


    public function destroy(Cake $cake)
    {
        $cake->delete();

        return redirect('admin/products')->with([
            'flash_message' => 'Тортик удален :('
        ]);
    }
}
