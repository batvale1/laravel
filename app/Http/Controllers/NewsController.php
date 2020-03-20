<?php

namespace App\Http\Controllers;

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

    private $news = [
        1 => [
            'id' => 1,
            'catId' => 1,
            'title' => 'a single news 1',
            'shortDesc' => 'a single news 1 short description',
            'fullDesc' => 'a single news 1 full description'
        ],
        2 => [
            'id' => 2,
            'catId' => 1,
            'title' => 'a single news 2',
            'shortDesc' => 'a single news 2 short description',
            'fullDesc' => 'a single news 2 full description'
        ],
        3 => [
            'id' => 3,
            'catId' => 1,
            'title' => 'a single news 3',
            'shortDesc' => 'a single news 3 short description',
            'fullDesc' => 'a single news 3 full description'
        ],
        4 => [
            'id' => 4,
            'catId' => 2,
            'title' => 'a single news 4',
            'shortDesc' => 'a single news 4 short description',
            'fullDesc' => 'a single news 4 full description'
        ],
        5 => [
            'id' => 5,
            'catId' => 2,
            'title' => 'a single news 5',
            'shortDesc' => 'a single news 5 short description',
            'fullDesc' => 'a single news 5 full description'
        ],
        6 => [
            'id' => 6,
            'catId' => 2,
            'title' => 'a single news 6',
            'shortDesc' => 'a single news 6 short description',
            'fullDesc' => 'a single news 6 full description'
        ],
        7 => [
            'id' => 7,
            'catId' => 2,
            'title' => 'a single news 7',
            'shortDesc' => 'a single news 7 short description',
            'fullDesc' => 'a single news 7 full description'
        ]
    ];

    function index() {
        return view('news/index', ['catNews' => $this->catNews]);
    }

    function newsCategoriesList($id) {
        $params['title'] = $this->catNews[$id]['title'];
        $params['items'] = [];
        foreach ($this->news as $key => $value) {
            if ($value['catId'] !== (int) $id) {
                continue;
            }
            $params['items'][] = ['id' => $key, 'title' => $value['title']];
        }
        return view('news/categoriesList', ['params' => $params]);
    }

    function newsCard($id) {
        return view('news.card', ['item' => $this->news[$id]]);
    }
}
