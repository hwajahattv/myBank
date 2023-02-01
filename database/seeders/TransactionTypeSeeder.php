<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('transaction_types')->delete();
        DB::table('transaction_types')->insert([
            ['name' => 'withdrawal', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'deposits', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'transfer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'online_payment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'utility_payment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'service_charges_deduction', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'investment', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'profit', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
