<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        DB::table('users')->insert([
            [
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'is_admin' => true,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'email' => 'user1@user.com',
                'password' => bcrypt('user1'),
                'is_admin' => false,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'email' => 'user2@user.com',
                'password' => bcrypt('user2'),
                'is_admin' => false,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);
    }
}
