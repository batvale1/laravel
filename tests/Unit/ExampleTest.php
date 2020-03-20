<?php

namespace Tests\Unit;

use App\Models\news;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetNews()
    {
        $model = new news();
        $this->assertIsArray($model->getNews());
        foreach ($model->getNews() as $key => $value) {
            $this->assertIsInt($key);
            $this->assertIsArray($value);
            if ($value['id']) {
                $this->assertIsInt($value['id']);
            };
            if ($value['catId']) {
                $this->assertIsInt($value['catId']);
            };
            if ($value['title']) {
                $this->assertIsString($value['title']);
            };
            if ($value['shortDesc']) {
                $this->assertIsString($value['shortDesc']);
            };
            if ($value['fullDesc']) {
                $this->assertIsString($value['fullDesc']);
            };
        }
    }
}
