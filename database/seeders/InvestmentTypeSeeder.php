<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvestmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investment_types')->delete();

        DB::table('investment_types')->insert([
            ['name' => 'Agriculture', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Real Estate', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Gold', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Transportation', 'created_at' => now(), 'updated_at' => now(),],
        ]);
    }
}
