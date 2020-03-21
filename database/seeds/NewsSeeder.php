<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->generateData());
    }

    protected function generateData() {
        $cats = DB::table('news_categories')->select('id')->pluck('id')->all();
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'cat_id' => $faker->randomElement($cats),
                'short_desc' => $faker->realText(rand(10, 50)),
                'full_desc' => $faker->realText(rand(10, 50)),
                'active' => $faker->boolean(),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ];
        }

        return $data;
    }
}
