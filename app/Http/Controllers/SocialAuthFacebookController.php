<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthFacebookController extends Controller
{
    public function loginFb() {
        if (\Auth::id()) {
            return redirect()->route('news::index');
        }
        return Socialite::with('facebook')->redirect();
    }

    public function responseFb(UserRepository $repository) {
        $user = Socialite::driver('facebook')->user();
        $systemUser = $repository->getUserBySocId($user, 'fb');
        \Auth::login($systemUser);
        return redirect()->route('news::index');
    }
}
