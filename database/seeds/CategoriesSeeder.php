<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert($this->generateData());
    }

    protected function generateData() {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
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
