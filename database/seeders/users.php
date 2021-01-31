<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];

        for ($i = 1; $i <= 1; $i++) {
            array_push($data, [
                'name'     => 'Michael Chow',
                'email'    => 'test@example.com',
                'password' => bcrypt('123456'),
                'role'     => 10,
                'bio'      => $faker->realText(),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            array_push($data, [
                'name'     => $faker->name(),
                'email'    => $faker->email,
                'password' => bcrypt('123456'),
                'role'     => 0,
                'bio'      => $faker->realText(),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        User::insert($data);
    }
}
