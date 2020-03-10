<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return '
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                             <meta http-equiv="X-UA-Compatible" content="ie=edge">
                 <title>Document</title>
    </head>
    <body>
        <h1>Hello, users!</h1>  
    </body>
    </html>
    ';
});

Route::get('/about', function () {
    return '
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                             <meta http-equiv="X-UA-Compatible" content="ie=edge">
                 <title>Document</title>
    </head>
    <body>
        <h1>The company in the world</h1>  
    </body>
    </html>
    ';
});

Route::get('/news', function () {
    return '
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
                 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                             <meta http-equiv="X-UA-Compatible" content="ie=edge">
                 <title>Document</title>
    </head>
    <body>
        <h1>Nothing to announce currently!</h1>  
    </body>
    </html>
    ';
});

