<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            [
                'name' => 'На рассмотрении',
                'position' => 1,
            ],
            [
                'name' => 'В процессе',
                'position' => 2,
            ],
            [
                'name' => 'Отменена',
                'position' => 3,
            ],
            [
                'name' => 'Выполнена',
                'position' => 4,
            ],
        ]);
    }
}
