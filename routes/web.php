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

/*Route::get('/', 'HomeController@index')
    ->name('home');*/

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
        Route::get('card/{news}', 'NewsController@newsCard')
            ->name('newsCard');
});

Route::get('/registration', 'RegistrationController@index')
    ->name('registration');

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin::news::',
        'middleware' => 'auth',
        'middleware' => 'isAdmin'
    ], function() {
        Route::get('/', 'NewsController@index')
            ->name('index');
        Route::match(['get'], '/createNews', 'NewsController@create')
            ->name('create');
        Route::match(['post'], '/saveNews', 'NewsController@save')
            ->name('save');
        Route::match(['get','post'],'/updateNews/{id}', 'NewsController@update')
            ->name('update');
        Route::get('/deleteNews/{id}', 'NewsController@delete')
            ->name('delete');
});

Route::group(
    [
        'prefix' => 'admin-profiles',
        'namespace' => 'Admin',
        'as' => 'admin::profiles::',
        'middleware' => ['auth', 'isAdmin', 'editProfile']
    ], function() {
    Route::get('/', 'ProfilesController@index')
        ->name('index');
    Route::match(['get','post'],'/profiles/{id}', 'ProfilesController@update')
        ->name('update');
});

Route::group(
    [
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin::profile::',
        'middleware' => ['auth', 'editProfileSelf']
    ], function() {
    Route::match(['get','post'],'/update', 'ProfileController@update')
        ->name('update');
});

Route::group(
    [
        'prefix' => 'admin-parser',
        'namespace' => 'Admin',
        'as' => 'admin::parser::',
        'middleware' => ['auth', 'isAdmin']
    ], function() {
    Route::get('/', 'ParserController@index')
        ->name('index');
    Route::post('/', 'ParserController@load')
        ->name('load');
});


Route::group(
    [
        'prefix' => 'social',
        'as' => 'social::',
    ], function() {
    Route::get('/login', 'SocialController@loginVk')
        ->name('login-vk');
    Route::get('/response', 'SocialController@responseVk')
        ->name('response-vk');
});

Route::group(
    [
        'prefix' => 'social-fb',
        'as' => 'social-fb::',
    ], function() {
    Route::get('/login', 'SocialAuthFacebookController@loginFb')
        ->name('login-fb');
    Route::get('/response', 'SocialAuthFacebookController@responseFb')
        ->name('response-fb');
});

Route::group(
    [
        'prefix' => 'admin-categories',
        'namespace' => 'Admin',
        'as' => 'admin::categories::',
        'middleware' => 'isAdmin'
    ], function() {
    Route::get('/', 'CategoriesController@index')
        ->name('index');
    Route::match(['get','post'], '/createCategories', 'CategoriesController@create')
        ->name('create');
    Route::match(['get','post'],'/updateCategories/{id}', 'CategoriesController@update')
        ->name('update');
    Route::get('/deleteCategories/{id}', 'CategoriesController@delete')
        ->name('delete');
});

Route::group(
    [
        'prefix' => 'admin-comments',
        'namespace' => 'Admin',
        'as' => 'admin::comments::',
        'middleware' => 'isAdmin'
    ], function() {
    Route::get('/', 'CommentsController@index')
        ->name('index');
    Route::match(['get','post'], '/createComments', 'CommentsController@create')
        ->name('create');
    Route::match(['get','post'],'/updateComments{id}', 'CommentsController@update')
        ->name('update');
    Route::get('/deleteNews/{id}', 'CommentsController@delete')
        ->name('delete');
});

Route::group(
    [
        'prefix' => 'test',
        'namespace' => 'test',
        'as' => 'test::'
    ], function () {
        Route::get('/db', 'DbController@index')
            ->name('index');
});

/*Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
