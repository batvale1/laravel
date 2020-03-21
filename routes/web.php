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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/about', 'AboutController@index')
    ->name('about');
Route::match(['get', 'post'],'/contactUs', 'ContactUsController@index')
    ->name('contactUs');
Route::group([
    'prefix' => 'news',
    'as' => 'news::'
],
    function () {
        Route::get('/', 'NewsController@index')
            ->name('index');
        Route::get('/{id}', 'NewsController@newsCategoriesList')
            ->name('CategoriesList');
        Route::get('card/{id}', 'NewsController@newsCard')
            ->name('newsCard');
});


Route::get('/registration', 'RegistrationController@index')
    ->name('registration');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin::news::'
    ], function() {
        Route::get('/', 'NewsController@index')
            ->name('index');
        Route::get('/createNews', 'NewsController@create')
            ->name('create');
});
