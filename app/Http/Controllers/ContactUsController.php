<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * @method GET / POST
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function index(Request $request) {
        $messageHasBeenSent = null;
        if ($request->isMethod('post')) {
            $messageHasBeenSent = true;
        }
        return view('contactUs', ['messageHasBeenSent' => $messageHasBeenSent]);
    }
}
