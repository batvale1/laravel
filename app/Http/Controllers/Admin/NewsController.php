<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminNewsEditRequest;
use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function index() {
        $news = News::query()->paginate(3);
        return view('admin/index', ['news' => $news]);
    }

    function create(Request $request) {
        $model = new News();
        return view('admin/create', ['model' => $model]);
    }

    function save(AdminNewsEditRequest $request) {
        if ($request->isMethod('post')) {
            $model = new News();
            $model->fill($request->all());
            $model->save();
            return redirect()->route('admin::news::create');
        }
    }

    function delete($id) {
        News::destroy([$id]);
        return redirect()->route('admin::news::index');
    }

    function update(Request $request, $id) {
        if ($request->isMethod('post')) {
            $model = News::find($id);
            $model->fill($request->all());
            if (!$request->has('active')) {
                $model->setAttribute('active', 0);
            };
            $model->save();

            return redirect()->route('admin::news::update', $id);
        }
        $model = News::find($id);
        return view('admin/update', ['item' => $model]);
    }
}
