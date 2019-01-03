<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    const COUNT = 5;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = DB::table('statuses')->select('id')->limit(self::COUNT)->get();

        if ($statuses->count()) {

            $faker = Faker\Factory::create('ru_RU');
            $now = \Carbon\Carbon::now();

            $tasks = [];

            for ($i = 0; $i < self::COUNT; $i++) {
                $tasks[] = [
                    'name' => $faker->sentence(4),
                    'description' => $faker->sentence(),
                    'end_time' => $now->addDays(rand(1, 10)),
                    'status_id' => $statuses[rand(0, $statuses->count()-1)]->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }

            DB::table('tasks')->insert($tasks);

        }
    }
}
