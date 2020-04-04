<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    function index() {
        $users = User::query()->paginate(3);
        return view('admin/index-profiles', ['users' => $users]);
    }

    function update(Request $request, $id) {
        if ($request->isMethod('post')) {
            $model = User::find($id);
            $model->fill([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'password' => \Hash::make($request->post('newPassword'))
            ]);
            if (!$request->has('is_admin')) {
                $model->setAttribute('is_admin', 0);
            } else {
                $model->setAttribute('is_admin', 1);
            };
            $model->save();
            return redirect()->route('admin::profiles::update', $id)->with('success', "Данные сохранены");
        }
        $model = User::find($id);
        return view('admin/update-profiles', ['user' => $model]);
    }
}
