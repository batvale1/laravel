<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EditProfileSelf
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), User::validationRulesSelfEditing());
            $errors = [];
            if (!\Hash::check($request->post('password'), $user->password)) {
                $errors['password'][] = 'Пароль указан неверно';
            }
            if ($validator->fails() || count($errors) > 0) {
                return redirect()->back()
                    ->withErrors($validator->errors()->merge($errors))
                    ->withInput();
            }
        }

        return $next($request);
    }
}
