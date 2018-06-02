<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Http\Request;

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

    public function edit($id)
    {
        $cake = Cake::findOrFail($id);
        $category = Category::all();

        $categoryIdValue = [];

        foreach ($category as $item) {
            $categoryIdValue[$item->id] = $item->name;
        }

        return view('administration.single-product', compact('cake', 'category', 'categoryIdValue'));
    }

    /**
     * Созданин тортика
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $cake = new Cake($request->all());
        $cake->save();

        return redirect('admin/products')->with([
            'flash_message' => 'Тортик успешнно добавлен :)'
        ]);

    }

    public function update($id, Request $request)
    {
        $cake = Cake::find($id);
        $cake->update($request->all());

        return redirect('admin/products')->with([
            'flash_message' => 'Тортик успешно обновлен ^^_'
        ]);


    }


    public function destroy($id)
    {
        $cake = Cake::find($id);
        $cake->delete();

        return redirect('admin/products')->with([
            'flash_message' => 'Тортик удален :('
        ]);
    }
}
