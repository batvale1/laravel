<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    function index() {
        $comments = Comments::query()->paginate(3);
        return view('admin/index-comments', ['comments' => $comments]);
    }

    function create(Request $request) {
        if ($request->isMethod('post')) {
            $model = new Comments();
            $model->fill($request->all());
            $model->save();

            return redirect()->route('admin::comments::create');
        }
        return view('admin/create-comments');
    }

    function delete($id) {
        Comments::destroy([$id]);
        return redirect()->route('admin::comments::index');
    }

    function update(Request $request, $id) {
        if ($request->isMethod('post')) {
            $model = Comments::find($id);
            $model->fill($request->all());
            if (!$request->has('active')) {
                $model->setAttribute('active', 0);
            };
            $model->save();

            return redirect()->route('admin::comments::update', $id);
        }
        $model = Comments::find($id);
        return view('admin/update-comments', ['item' => $model]);
    }
}
