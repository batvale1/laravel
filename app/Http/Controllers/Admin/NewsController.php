<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function index() {
        $url = route('admin::news::create');
        $html = "";
        $html .= "<h1>Admin panel</h1>";
        $html .= "<a href='{$url}'>Create a single news</a>";
        echo $html;
    }

    function create() {
        $html = "<form action=''>
                <label>
                    News name:
                    <input type='text'>
                </label>
                <label>
                    Short desc:
                    <input type='text'>
                </label>
                <label>
                    Full desc:
                    <input type='text'>
                </label>
                <label>
                    <input type='submit'>
                </label>
            </form>";
        echo $html;
    }
}
