<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10000; $i++) {
        DB::table('referrals')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'phone' => '09123456789',
            'address' => Str::random(10),
            'account_number' => Str::random(10),
            'bank_name' => Str::random(10),
            'hospitalname' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
}
