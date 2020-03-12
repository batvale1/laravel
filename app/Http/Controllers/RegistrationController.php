<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    function index() {
        $html = "";
        $html .= "
        <form action=''>
            <label>
                Login
                <input type='text'>
            </label>
            <label>
                Password
                <input type='password'>
            </label>
            <label>
                Save?
                <input type='checkbox'>
            </label>
            <label>
            <input type='submit'>
            </label>
        </form>
        ";
        echo $html;
    }
}
