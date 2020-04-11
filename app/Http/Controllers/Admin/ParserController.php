<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use App\Models\Resources;
use App\Services\XmlParcerService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class ParserController extends Controller
{
    public function index() {
        return view('admin.index-parser');
    }

    public function load() {

        $sources = Resources::query()->get('link');
        foreach ($sources as $source) {
            NewsParsing::dispatch($source->link);
        }

        return redirect()->route('admin::parser::index')->with('success', "Отправлен запрос на загрузку");

    }
}
