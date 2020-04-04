<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => \Hash::make($request->post('newPassword'))
                ]
            );
            $user->save();
            return redirect()->route('admin::profile::update')->with('success', "Данные сохранены");
        }
        return view('admin.update-profile', ['user' => $user]);
    }

    protected function ValidateRules()
    {
        return [
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }
}
