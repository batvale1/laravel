<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $about = route('about');
        $news = route('news::index');
        $registration = route('registration');
        $admin = route('admin::news::index');
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
                        <h1 class='header__title'>Hello, this is home news page</h1>
                    </header>    
                    <section class='content'>
                        <nav class='main-menu'>
                            <ul class='main-menu__list'>
                                <li class='main-menu__list-item'><a href='{$about}' class='main-menu__link'>About</a></li>
                                <li class='main-menu__list-item'><a href='{$news}' class='main-menu__link'>News</a></li>
                                <li class='main-menu__list-item'><a href='{$registration}' class='main-menu__link'>Registration</a></li>
                                <li class='main-menu__list-item'><a href='{$admin}' class='main-menu__link'>Admin</a></li>
                            </ul>
                        </nav>
                    </section>
                    <footer class='footer'></footer>
                </div>
            </body>
            </html>
        ";
    }
}
