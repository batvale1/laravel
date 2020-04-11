<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function loginVk() {
        if (\Auth::id()) {
            return redirect()->route('news::index');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVk(UserRepository $repository) {
        $user = Socialite::driver('vkontakte')->user();
        $systemUser = $repository->getUserBySocId($user, 'vk');
        \Auth::login($systemUser);
        return redirect()->route('news::index');
    }
}
