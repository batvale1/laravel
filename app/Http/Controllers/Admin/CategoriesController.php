<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    function index() {
        $categories = Categories::query()->paginate(3);
        return view('admin/index-categories', ['categories' => $categories]);
    }

    function create(Request $request) {
        if ($request->isMethod('post')) {
            $model = new Categories();
            $model->fill($request->all());
            $model->save();

            return redirect()->route('admin::categories::create');
        }
        return view('admin/create-categories');
    }

    function delete($id) {
        Categories::destroy([$id]);
        return redirect()->route('admin::categories::index');
    }

    function update(Request $request, $id) {
        if ($request->isMethod('post')) {
            $model = Categories::find($id);
            $model->fill($request->all());
            if (!$request->has('active')) {
                $model->setAttribute('active', 0);
            };
            $model->save();

            return redirect()->route('admin::categories::update', $id);
        }
        $model = Categories::find($id);
        return view('admin/update-categories', ['item' => $model]);
    }
}
