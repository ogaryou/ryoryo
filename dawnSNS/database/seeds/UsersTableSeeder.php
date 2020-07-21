<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => '山田', 'mail' => 'yamadanet@gmail.com', 'password' =>'yamadanetman'],
            ['username' => '田中', 'mail' => 'tanakanet@gmail.com', 'password' => 'tanakanetman'],
            ['username' => '佐藤', 'mail' => 'satounet@gmail.com', 'password' => 'satounetman']
        ]);
    }
}
