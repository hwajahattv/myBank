<?php

namespace Database\Seeders;

use DateTime;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $transaction_types = DB::table('transaction_types')->pluck('id')->toArray();
        $accounts = DB::table('accounts')->pluck('id')->toArray();
        $transactions = [];
        foreach (range(1, 100) as $index) {
            $random_transaction_type_id = array_rand($transaction_types, 1);
            $random_taccount_id = array_rand($accounts, 1);
            $random_faccount_id = array_rand($accounts, 1);
            $transaction = [
                'amount_of_transaction' => 0,
                'transaction_type_id' => $transaction_types[$random_transaction_type_id],
                'taccount_id' => $accounts[$random_taccount_id],
                'faccount_id' => $accounts[$random_faccount_id],
                'date_of_transaction' => $faker->dateTime(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $transactions[] = $transaction;
        }
        DB::table('transactions')->insert($transactions);
    }
}
