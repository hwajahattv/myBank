<?php

namespace Database\Seeders;

use App\Models\Utility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utilities = [
            ['name' => 'Electricity'],
            ['name' => 'Gas'],
            ['name' => 'Telephone'],
            ['name' => 'Internet'],
            ['name' => 'School Fee'],
            ['name' => 'Transport'],
            ['name' => 'Medical'],
        ];
        foreach ($utilities as $utility) {
            Utility::create($utility);
        }
    }
}
