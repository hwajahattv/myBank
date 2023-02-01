<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Utility;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utilities = Utility::all();
        $bills = [];
        $faker = Factory::create();
        foreach ($utilities as $utility) {
            foreach (range(1, 10) as $index) {
                $bill = [
                    'utility_id' => $utility->id,
                    'consumer_number' => rand(10000, 99999),
                    'consumer_name' => $faker->name(),
                    'amount' => rand(200, 9999),
                    'created_at' => now(),
                    'updated_at' => now()
                ];
                $bills[] = $bill;
            }
        }
        Bill::insert($bills);
    }
}
