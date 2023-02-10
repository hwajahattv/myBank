<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvestmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $investment_types = DB::table('investment_types')->get();
        $faker = Factory::create();
        foreach ($investment_types as $type) {
            foreach (range(1, 10) as $index) {
                DB::table('investments')->insert([
                    'name' => 'Investment Plan_' . Str::random(5),
                    'company' => $faker->company(),
                    'return_cycle' => rand(1, 12),
                    'return_rate' => rand(1, 10),
                    'amount' => 1000 * rand(1, 10),
                    'investment_type_id' => $type->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
