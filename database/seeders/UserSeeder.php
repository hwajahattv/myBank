<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [];
        $newPassword = '12341234';
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $user = [
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($newPassword),
                'phone_no' => $faker->phoneNumber(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $users[] = $user;
        }
        DB::table('users')->insert($users);
    }
}
