<?php
/**
 * Created by PhpStorm.
 * User: HomeUser
 * Date: 21.03.2020
 * Time: 21:57
 */

namespace App\Http\Controllers\Test;
use App\Http\Controllers\Controller;

class DbController extends Controller
{
    function index() {
        $sql = "
            select * from news;
        ";
        $result = \DB::select($sql);
        dd($result);
    }
}