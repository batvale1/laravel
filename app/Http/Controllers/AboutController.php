<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index() {
        echo "
        <!doctype html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport'
                      content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
                <meta http-equiv='X-UA-Compatible' content='ie=edge'>
                <title>Document</title>
            </head>
            <body>
                <div class='page'>
                    <header class='header'>
                        <h1 class='header__title'>Hello, this site is about news</h1>
                    </header>    
                    <footer class='footer'></footer>
                </div>
            </body>
            </html>
        ";
    }
}
