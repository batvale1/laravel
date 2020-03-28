<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;

class NewsController extends Controller
{
    function index() {

        $categories = Categories::query()->paginate(5);
        return view('news/index', ['catNews' => $categories]);
    }

    function newsCategoriesList($id) {

        $category = Categories::find($id);

        return view('news/categoriesList', ['category' => $category]);
    }

    function newsCard(News $news) {
        return view('news.card', ['item' => $news]);
    }
}
