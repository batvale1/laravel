<?php

namespace App\Http\Controllers;

use App\Models\news;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $catNews = [
        1 => [
            'id' => 1,
            'title' => 'World'
        ],
        2 => [
            'id' => 2,
            'title' => 'Economics'
        ],
        3 => [
            'id' => 3,
            'title' => 'Sports'
        ],
        4 => [
            'id' => 4,
            'title' => 'Movies'
        ]
    ];

    function index() {
        return view('news/index', ['catNews' => $this->catNews]);
    }

    function newsCategoriesList($id) {
        $params['title'] = $this->catNews[$id]['title'];
        $params['items'] = [];
        foreach ((new news())->getNews() as $key => $value) {
            if ($value['catId'] !== (int) $id) {
                continue;
            }
            $params['items'][] = ['id' => $key, 'title' => $value['title']];
        }
        return view('news/categoriesList', ['params' => $params]);
    }

    function newsCard($id) {
        return view('news.card', ['item' => (new news())->getNews()[$id]]);
    }
}
