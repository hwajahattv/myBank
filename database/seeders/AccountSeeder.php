<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $account_number = 5450000;
        $date = date('y-m-d');
        $accounts = [];
        foreach ($users as $key => $user) {
            $account = [
                'account_number' => $account_number + $key,
                'title' => $user->name,
                'type' => 'basic',
                'date_opened' => $date,
                'user_id' => $user->id,
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $accounts[] = $account;
        }
        DB::table('accounts')->insert($accounts);
    }
}
