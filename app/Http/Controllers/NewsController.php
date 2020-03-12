<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $catNews = [
        1 => [
            'title' => 'World'
        ],
        2 => [
            'title' => 'Economics'
        ],
        3 => [
            'title' => 'Sports'
        ],
        4 => [
            'title' => 'Movies'
        ]
    ];

    private $news = [
        1 => [
            'catId' => 1,
            'title' => 'a single news 1',
            'shortDesc' => 'a single news 1 short description',
            'fullDesc' => 'a single news 1 full description'
        ],
        2 => [
            'catId' => 1,
            'title' => 'a single news 2',
            'shortDesc' => 'a single news 2 short description',
            'fullDesc' => 'a single news 2 full description'
        ],
        3 => [
            'catId' => 1,
            'title' => 'a single news 3',
            'shortDesc' => 'a single news 3 short description',
            'fullDesc' => 'a single news 3 full description'
        ],
        4 => [
            'catId' => 2,
            'title' => 'a single news 4',
            'shortDesc' => 'a single news 4 short description',
            'fullDesc' => 'a single news 4 full description'
        ],
        5 => [
            'catId' => 2,
            'title' => 'a single news 5',
            'shortDesc' => 'a single news 5 short description',
            'fullDesc' => 'a single news 5 full description'
        ],
        6 => [
            'catId' => 2,
            'title' => 'a single news 6',
            'shortDesc' => 'a single news 6 short description',
            'fullDesc' => 'a single news 6 full description'
        ],
        7 => [
            'catId' => 2,
            'title' => 'a single news 7',
            'shortDesc' => 'a single news 7 short description',
            'fullDesc' => 'a single news 7 full description'
        ]
    ];

    function index() {
        $url = route('news::index');
        $html = "";
        $html .= "<ul>";
        foreach ($this->catNews as $key => $value) {
            $url = route('news::CategoriesList', ['id' => $key]);
            $html .= "<li><a href='{$url}'>{$value['title']}</a></li>";
        }
        $html .= "</ul>";
        echo $html;
    }

    function newsCategoriesList($id) {
        $html = "";
        $html = "<h1>{$this->catNews[$id]['title']}</h1>";
        foreach ($this->news as $key => $value) {
            if ($value['catId'] !== (int) $id) {
                continue;
            }
            $url = route('news::newsCard', ['id' => $key]);
            $html .= "<h2><a href='{$url}'>{$value['title']}</a></h2>";
        }
        echo $html;
    }

    function newsCard($id) {
        $html = "";
        $html .= "<h1>{$this->news[$id]['title']}</h1>";
        $html .= "<p>Short desc: {$this->news[$id]['title']}</p>";
        $html .= "<p>Full desc:{$this->news[$id]['title']}</p>";
        echo $html;
    }
}
