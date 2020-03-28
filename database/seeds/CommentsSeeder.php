<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert($this->generateData());
    }

    protected function generateData() {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i < 40; $i++) {
            $data[] = [
                'news_id' => random_int(1, 10),
                'user_text' => $faker->realText(rand(10, 50)),
                'active' => $faker->boolean(),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d')
            ];
        }

        return $data;
    }
}
