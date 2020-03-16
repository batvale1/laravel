<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    function index() {
        return view('admin/index');
    }

    function create() {
        return view('admin/create');
    }
}
