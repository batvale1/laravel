<?php
/**
 * Created by PhpStorm.
 * User: HomeUser
 * Date: 11.04.2020
 * Time: 20:31
 */

namespace App\Services;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\News;

class XmlParcerService
{
    public function parse($source) {
        $xml = XmlParser::load($source);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'items' => ['uses' => 'channel.item[title,description,guid]'],
        ]);

        $items = $data['items'];
        foreach ($items as $item) {
            $shortDesc = $item['title'];
            $fullDesc = $item['description'];
            $outerRef = $item['guid'];
            //dd($title, $shortDesc, $outerRef);
            $model = News::where('outer_ref', $outerRef)->first();
            if (!isset($model)) {
                $model = new News();
            }
            $model->fill([
                'cat_id' => 1,
                'full_desc' => mb_substr($fullDesc, 0, 60),
                'short_desc' => mb_substr($shortDesc, 0, 60),
                'active' => true,
                'outer_ref' => $outerRef
            ]);
            $model->save();
            $model = null;
        }
    }
}